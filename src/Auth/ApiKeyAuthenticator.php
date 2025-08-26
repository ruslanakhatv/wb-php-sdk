<?php

namespace WB\SDK\Auth;

use WB\SDK\Exceptions\AuthorizationException;

class ApiKeyAuthenticator
{
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->validateApiKey($apiKey);
        $this->apiKey = $apiKey;
    }

    /**
     * Валидирует API ключ
     *
     * @param string $apiKey
     * @throws AuthorizationException
     */
    private function validateApiKey(string $apiKey): void
    {
        if (empty($apiKey)) {
            throw new AuthorizationException('API key cannot be empty');
        }

        if (strlen($apiKey) < 10) {
            throw new AuthorizationException('API key is too short');
        }

        // Дополнительные проверки формата API ключа Wildberries
        if (!preg_match('/^[a-zA-Z0-9_-]+$/', $apiKey)) {
            throw new AuthorizationException('Invalid API key format');
        }
    }

    /**
     * Возвращает заголовки авторизации
     *
     * @return array
     */
    public function getAuthHeaders(): array
    {
        return [
            'Authorization' => $this->apiKey,
            'X-Api-Key' => $this->apiKey
        ];
    }

    /**
     * Возвращает API ключ
     *
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * Проверяет валидность API ключа
     *
     * @return bool
     */
    public function isValid(): bool
    {
        try {
            $this->validateApiKey($this->apiKey);
            return true;
        } catch (AuthorizationException) {
            return false;
        }
    }

    /**
     * Создает экземпляр аутентификатора из переменных окружения
     *
     * @param string $envKey
     * @return static
     * @throws AuthorizationException
     */
    public static function fromEnv(string $envKey = 'WB_API_KEY'): self
    {
        $apiKey = getenv($envKey);
        
        if ($apiKey === false) {
            throw new AuthorizationException(sprintf('Environment variable %s not found', $envKey));
        }

        return new self($apiKey);
    }

    /**
     * Создает экземпляр аутентификатора из файла
     *
     * @param string $filePath
     * @param string $keyName
     * @return static
     * @throws AuthorizationException
     */
    public static function fromFile(string $filePath, string $keyName = 'api_key'): self
    {
        if (!file_exists($filePath)) {
            throw new AuthorizationException(sprintf('Config file %s not found', $filePath));
        }

        $config = parse_ini_file($filePath);
        
        if (!isset($config[$keyName])) {
            throw new AuthorizationException(sprintf('Key %s not found in config file', $keyName));
        }

        return new self($config[$keyName]);
    }
}
