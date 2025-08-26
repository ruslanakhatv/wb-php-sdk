<?php

namespace WB\SDK\DTO\Requests;

abstract class BaseRequest
{
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
