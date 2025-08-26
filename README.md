# Wildberries PHP SDK

Профессиональный PHP SDK для работы с API Wildberries с поддержкой DTO.

## 📦 Установка

```bash
composer require your-username/wb-php-sdk
Или добавьте в composer.json:
{
    "require": {
        "your-username/wb-php-sdk": "dev-main"
    },
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/your-username/wb-php-sdk"
        }
    ]
}

## 🚀 Быстрый старт
<?php

require 'vendor/autoload.php';

use WB\SDK\WBAPI;
use WB\SDK\Enums\ContentLanguage;
use WB\SDK\Enums\TagColor;
use WB\SDK\DTO\Requests\Cards\CardCreateRequest;
use WB\SDK\DTO\Requests\Cards\CardVariantRequest;

$sdk = new WBAPI('your-api-key-here');

// Работа с категориями
$categories = $sdk->content()->categories()->getParentCategories(ContentLanguage::RU);

// Работа с DTO
$cardRequest = new CardCreateRequest();
$cardRequest->subjectID = 105;

$variant = new CardVariantRequest();
$variant->vendorCode = 'TEST_001';
$variant->title = 'Тестовый товар';
// ... остальные поля

$cardRequest->variants = [$variant];
$result = $sdk->content()->cards()->createWithDTO($cardRequest);

// Работа с ценами
$sdk->prices()->prices()->setPrices([
    ['nmID' => 123, 'price' => 1000, 'discount' => 15]
]);

// Работа со складами
$stocks = $sdk->marketplace()->stocks()->getStocks(1, ['SKU123', 'SKU456']);
📚 Документация
Доступные клиенты:
$sdk->content() - работа с контентом (карточки, категории, теги)

$sdk->prices() - работа с ценами и скидками

$sdk->marketplace() - работа со складами и остатками

DTO поддержка:
Все методы имеют DTO-версии с суффиксом DTO:

getParentCategoriesDTO()

createWithDTO()

setPricesDTO()

🔧 Требования
PHP 8.1+

GuzzleHTTP 7.0+

JSON extension

📄 Лицензия
MIT License - смотрите файл LICENSE

🤝 Contributing
Форкните репозиторий

Создайте feature branch: git checkout -b feature/new-feature

Сделайте коммит: git commit -am 'Add new feature'

Запушьте ветку: git push origin feature/new-feature

Создайте Pull Request

📞 Поддержка
Если у вас есть вопросы или предложения, создавайте issue в GitHub.
