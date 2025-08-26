<?php

namespace WB\SDK\DTO\Responses\Stocks;

use WB\SDK\DTO\Responses\BaseResponse;

class WarehouseResponse extends BaseResponse
{
    public string $name;
    public int $officeId;
    public int $id;
    public int $cargoType;
    public int $deliveryType;
    public bool $selected;
}
