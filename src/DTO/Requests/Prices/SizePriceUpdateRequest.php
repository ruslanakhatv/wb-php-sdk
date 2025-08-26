<?php

namespace WB\SDK\DTO\Requests\Prices;

use WB\SDK\DTO\Requests\BaseRequest;

class SizePriceUpdateRequest extends BaseRequest
{
    public int $nmID;
    public int $sizeID;
    public int $price;
}
