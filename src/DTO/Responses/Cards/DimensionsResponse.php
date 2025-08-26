<?php

namespace WB\SDK\DTO\Responses\Cards;

use WB\SDK\DTO\Responses\BaseResponse;

class DimensionsResponse extends BaseResponse
{
    public int $length;
    public int $width;
    public int $height;
    public float $weightBrutto;
    public bool $isValid;
}
