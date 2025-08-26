<?php

namespace WB\SDK\DTO\Requests\Prices;

use WB\SDK\DTO\Requests\BaseRequest;

class PriceUpdateRequest extends BaseRequest
{
    public int $nmID;
    public ?int $price = null;
    public ?int $discount = null;
}
