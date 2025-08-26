<?php

namespace WB\SDK\DTO\Requests\Cards;

use WB\SDK\DTO\Requests\BaseRequest;

class SizeRequest extends BaseRequest
{
    public ?int $chrtID = null;
    public ?string $techSize = null;
    public ?string $wbSize = null;
    public ?int $price = null;
    
    /** @var string[] */
    public array $skus = [];
}
