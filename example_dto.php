<?php

require 'vendor/autoload.php';

use WB\SDK\WBAPI;
use WB\SDK\Enums\ContentLanguage;
use WB\SDK\DTO\Requests\Cards\CardCreateRequest;
use WB\SDK\DTO\Requests\Cards\CardVariantRequest;
use WB\SDK\DTO\Requests\Cards\DimensionsRequest;
use WB\SDK\DTO\Requests\Cards\CharacteristicRequest;
use WB\SDK\DTO\Requests\Cards\SizeRequest;

$sdk = new WBAPI('your-api-key-here');

try {
    // Пример создания карточки с DTO
    $cardRequest = new CardCreateRequest();
    $cardRequest->subjectID = 105;
    
    $variant = new CardVariantRequest();
    $variant->vendorCode = 'TEST_VENDOR_001';
    $variant->title = 'Тестовый товар';
    $variant->description = 'Описание тестового товара';
    $variant->brand = 'Test Brand';
    
    $dimensions = new DimensionsRequest();
    $dimensions->length = 30;
    $dimensions->width = 20;
    $dimensions->height = 10;
    $dimensions->weightBrutto = 1.5;
    $variant->dimensions = $dimensions;
    
    $characteristic = new CharacteristicRequest();
    $characteristic->id = 14177449;
    $characteristic->value = ['красный'];
    $variant->characteristics = [$characteristic];
    
    $size = new SizeRequest();
    $size->techSize = 'M';
    $size->wbSize = '48';
    $size->price = 1000;
    $size->skus = ['1234567890123'];
    $variant->sizes = [$size];
    
    $cardRequest->variants = [$variant];
    
    // Создаем карточку
    $result = $sdk->content()->cards()->createWithDTO($cardRequest);
    print_r($result);
    
    // Получаем категории с DTO
    $categories = $sdk->content()->categories()->getParentCategoriesDTO(ContentLanguage::RU);
    foreach ($categories as $category) {
        echo "Категория: {$category->name} (ID: {$category->id})\n";
    }
    
} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";
}
