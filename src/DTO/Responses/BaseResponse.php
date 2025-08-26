<?php

namespace WB\SDK\DTO\Responses;

abstract class BaseResponse
{
    public static function fromArray(array $data): static
    {
        $instance = new static();
        
        foreach ($data as $key => $value) {
            if (property_exists($instance, $key)) {
                $instance->$key = $value;
            }
        }
        
        return $instance;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
