<?php

namespace WB\SDK\DTO\Requests\Cards;

use WB\SDK\DTO\Requests\BaseRequest;

class CardCreateRequest extends BaseRequest
{
    public int $subjectID;
    
    /** @var CardVariantRequest[] */
    public array $variants;
}
