<?php

namespace WB\SDK\DTO\Requests\Cards;

use WB\SDK\DTO\Requests\BaseRequest;

class WholesaleRequest extends BaseRequest
{
    public bool $enabled;
    public int $quantum;
}
