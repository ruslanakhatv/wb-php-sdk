<?php

namespace WB\SDK\DTO\Responses\Cards;

use WB\SDK\DTO\Responses\BaseResponse;

class WholesaleResponse extends BaseResponse
{
    public bool $enabled;
    public int $quantum;
}
