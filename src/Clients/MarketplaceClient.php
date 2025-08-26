<?php

namespace WB\SDK\Clients;

use WB\SDK\Resources\StocksResource;
use WB\SDK\Resources\WarehousesResource;

class MarketplaceClient extends BaseClient
{
    private const BASE_URL = 'https://marketplace-api.wildberries.ru';

    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey, self::BASE_URL);
    }

    public function stocks(): StocksResource
    {
        return new StocksResource($this);
    }

    public function warehouses(): WarehousesResource
    {
        return new WarehousesResource($this);
    }
}
