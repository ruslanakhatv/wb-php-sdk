<?php

require 'vendor/autoload.php';

use WB\SDK\WBAPI;
use WB\SDK\Auth\ApiKeyAuthenticator;

try {
    // Способ 1: Прямая передача API ключа
    $sdk = new WBAPI('your-api-key-here');
    
    // Способ 2: Из переменных окружения
    putenv('WB_API_KEY=your-api-key-here');
    $authenticator = ApiKeyAuthenticator::fromEnv('WB_API_KEY');
    
    // Проверяем валидность ключа
    if ($authenticator->isValid()) {
        echo "API ключ валиден\n";
        $sdk = new WBAPI($authenticator->getApiKey());
    }
    
    // Способ 3: Из конфигурационного файла
    // Создаем временный config файл для примера
    file_put_contents('config.ini', "api_key = your-api-key-here\n");
    $authenticator = ApiKeyAuthenticator::fromFile('config.ini', 'api_key');
    $sdk = new WBAPI($authenticator->getApiKey());
    
    // Получаем заголовки авторизации
    $headers = $authenticator->getAuthHeaders();
    print_r($headers);
    
} catch (Exception $e) {
    echo "Ошибка аутентификации: " . $e->getMessage() . "\n";
}
