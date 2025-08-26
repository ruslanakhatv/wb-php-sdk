<?php

namespace WB\SDK\DTO\Responses;

class ErrorResponse extends BaseResponse
{
    public string $code;
    public string $message;
    public $data;
}
