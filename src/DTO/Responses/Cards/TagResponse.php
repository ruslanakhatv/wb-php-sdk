<?php

namespace WB\SDK\DTO\Responses\Cards;

use WB\SDK\DTO\Responses\BaseResponse;

class TagResponse extends BaseResponse
{
    public int $id;
    public string $name;
    public string $color;
}
