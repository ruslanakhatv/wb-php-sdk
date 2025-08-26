<?php

namespace WB\SDK\DTO\Responses\Prices;

use WB\SDK\DTO\Responses\BaseResponse;

class SizePriceResponse extends BaseResponse
{
    public int $sizeID;
    public int $price;
    public float $discountedPrice;
    public float $clubDiscountedPrice;
    public string $techSizeName;
    public int $discount;
    public int $clubDiscount;
}
