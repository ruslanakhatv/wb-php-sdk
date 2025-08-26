<?php

namespace WB\SDK\DTO\Responses\Prices;

use WB\SDK\DTO\Responses\BaseResponse;

class PriceResponse extends BaseResponse
{
    public int $nmID;
    public string $vendorCode;
    
    /** @var SizePriceResponse[] */
    public array $sizes = [];
    
    public string $currencyIsoCode4217;
    public int $discount;
    public int $clubDiscount;
    public bool $editableSizePrice;
}
