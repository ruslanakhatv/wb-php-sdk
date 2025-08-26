<?php

namespace WB\SDK\Clients;

use WB\SDK\Resources\PricesResource;

class PricesClient extends BaseClient
{
    private const BASE_URL = 'https://discounts-prices-api.wildberries.ru';

    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey, self::BASE_URL);
    }

    public function prices(): PricesResource
    {
        return new PricesResource($this);
    }
}
