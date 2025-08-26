<?php

namespace WB\SDK\DTO\Requests\Cards;

use WB\SDK\DTO\Requests\BaseRequest;

class CharacteristicRequest extends BaseRequest
{
    public int $id;
    
    /** @var string|int|array */
    public $value;
}
