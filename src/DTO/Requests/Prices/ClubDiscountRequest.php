<?php

namespace WB\SDK\DTO\Requests\Prices;

use WB\SDK\DTO\Requests\BaseRequest;

class ClubDiscountRequest extends BaseRequest
{
    public int $nmID;
    public int $clubDiscount;
}
