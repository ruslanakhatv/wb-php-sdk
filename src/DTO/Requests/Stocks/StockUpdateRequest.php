<?php

namespace WB\SDK\DTO\Requests\Stocks;

use WB\SDK\DTO\Requests\BaseRequest;

class StockUpdateRequest extends BaseRequest
{
    public string $sku;
    public int $amount;
}
