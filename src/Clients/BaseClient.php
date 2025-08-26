<?php

namespace WB\SDK\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use WB\SDK\Exceptions\ApiException;
use WB\SDK\Exceptions\AuthorizationException;

abstract class BaseClient
{
    protected Client $client;
    protected string $baseUrl;

    public function __construct(string $apiKey, string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
        $this->client = new Client([
            'base_uri' => $baseUrl,
            'headers' => [
                'Authorization' => $apiKey,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
            'timeout' => 30,
            'connect_timeout' => 10
        ]);
    }

    protected function request(string $method, string $uri, array $options = []): array
    {
        try {
            $response = $this->client->request($method, $uri, $options);
            $body = $response->getBody()->getContents();
            
            return json_decode($body, true) ?? [];
        } catch (GuzzleException $e) {
            if ($e->getCode() === 401) {
                throw new AuthorizationException();
            }
            
            throw new ApiException(
                sprintf('API request failed: %s', $e->getMessage()),
                $e->getCode(),
                $e
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
}
