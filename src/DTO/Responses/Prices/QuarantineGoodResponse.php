<?php

namespace WB\SDK\DTO\Responses\Prices;

use WB\SDK\DTO\Responses\BaseResponse;

class QuarantineGoodResponse extends BaseResponse
{
    public int $nmID;
    public ?int $sizeID = null;
    public string $techSizeName;
    public string $currencyIsoCode4217;
    public float $newPrice;
    public float $oldPrice;
    public int $newDiscount;
    public int $oldDiscount;
    public float $priceDiff;
}
