<?php

namespace WB\SDK\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use WB\SDK\Auth\ApiKeyAuthenticator;
use WB\SDK\Exceptions\ApiException;
use WB\SDK\Exceptions\AuthorizationException;

abstract class BaseClient
{
    protected Client $client;
    protected string $baseUrl;
    protected ApiKeyAuthenticator $authenticator;

    public function __construct(string $apiKey, string $baseUrl)
    {
        $this->authenticator = new ApiKeyAuthenticator($apiKey);
        $this->baseUrl = $baseUrl;
        
        $this->client = new Client([
            'base_uri' => $baseUrl,
            'headers' => array_merge([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => 'WB-PHP-SDK/1.0.0'
            ], $this->authenticator->getAuthHeaders()),
            'timeout' => 30,
            'connect_timeout' => 10,
            'http_errors' => false
        ]);
    }

    protected function request(string $method, string $uri, array $options = []): array
    {
        try {
            $response = $this->client->request($method, $uri, $options);
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();
            
            $data = json_decode($body, true) ?? [];
            
            if ($statusCode >= 400) {
                $this->handleError($statusCode, $data);
            }
            
            return $data;
            
        } catch (GuzzleException $e) {
            throw new ApiException(
                sprintf('API request failed: %s', $e->getMessage()),
                $e->getCode(),
                $e
            );
        }
    }

    /**
     * Обрабатывает ошибки API
     *
     * @param int $statusCode
     * @param array $data
     * @throws AuthorizationException
     * @throws ApiException
     */
    protected function handleError(int $statusCode, array $data): void
    {
        $errorMessage = $data['errorText'] ?? $data['message'] ?? 'Unknown error';
        
        switch ($statusCode) {
            case 401:
            case 403:
                throw new AuthorizationException(
                    sprintf('Authorization failed: %s', $errorMessage),
                    $statusCode
                );
                
            case 429:
                throw new ApiException(
                    sprintf('Rate limit exceeded: %s', $errorMessage),
                    $statusCode
                );
                
            default:
                throw new ApiException(
                    sprintf('API error %d: %s', $statusCode, $errorMessage),
                    $statusCode
                );
        }
    }

    protected function get(string $uri, array $query = []): array
    {
        return $this->request('GET', $uri, ['query' => $query]);
    }

    protected function post(string $uri, array $data = []): array
    {
        return $this->request('POST', $uri, ['json' => $data]);
    }

    protected function put(string $uri, array $data = []): array
    {
        return $this->request('PUT', $uri, ['json' => $data]);
    }

    protected function patch(string $uri, array $data = []): array
    {
        return $this->request('PATCH', $uri, ['json' => $data]);
    }

    protected function delete(string $uri, array $data = []): array
    {
        return $this->request('DELETE', $uri, ['json' => $data]);
    }

    /**
     * Возвращает аутентификатор
     *
     * @return ApiKeyAuthenticator
     */
    public function getAuthenticator(): ApiKeyAuthenticator
    {
        return $this->authenticator;
    }
}
