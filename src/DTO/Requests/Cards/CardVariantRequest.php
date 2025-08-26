<?php

namespace WB\SDK\DTO\Requests\Cards;

use WB\SDK\DTO\Requests\BaseRequest;

class CardVariantRequest extends BaseRequest
{
    public ?string $brand = null;
    public ?string $title = null;
    public ?string $description = null;
    public string $vendorCode;
    public ?WholesaleRequest $wholesale = null;
    public ?DimensionsRequest $dimensions = null;
    
    /** @var CharacteristicRequest[] */
    public array $characteristics = [];
    
    /** @var SizeRequest[] */
    public array $sizes = [];
}
