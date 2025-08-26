<?php

namespace WB\SDK\DTO\Responses\Stocks;

use WB\SDK\DTO\Responses\BaseResponse;

class StockResponse extends BaseResponse
{
    public string $sku;
    public int $amount;
}
