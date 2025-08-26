<?php

namespace WB\SDK\DTO\Requests\Cards;

use WB\SDK\DTO\Requests\BaseRequest;

class DimensionsRequest extends BaseRequest
{
    public int $length;
    public int $width;
    public int $height;
    public float $weightBrutto;
}
