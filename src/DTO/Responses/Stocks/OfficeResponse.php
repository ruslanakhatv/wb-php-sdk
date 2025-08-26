<?php

namespace WB\SDK\DTO\Responses\Stocks;

use WB\SDK\DTO\Responses\BaseResponse;

class OfficeResponse extends BaseResponse
{
    public string $address;
    public string $name;
    public string $city;
    public int $id;
    public float $longitude;
    public float $latitude;
    public int $cargoType;
    public int $deliveryType;
    public ?string $federalDistrict = null;
    public bool $selected;
}
