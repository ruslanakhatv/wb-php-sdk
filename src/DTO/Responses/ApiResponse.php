<?php

namespace WB\SDK\DTO\Responses;

class ApiResponse extends BaseResponse
{
    public $data;
    public bool $error;
    public string $errorText;
    public $additionalErrors;
}
