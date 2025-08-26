<?php

namespace WB\SDK\DTO\Responses\Cards;

use WB\SDK\DTO\Responses\BaseResponse;

class SizeResponse extends BaseResponse
{
    public int $chrtID;
    public string $techSize;
    public string $wbSize;
    
    /** @var string[] */
    public array $skus = [];
}
