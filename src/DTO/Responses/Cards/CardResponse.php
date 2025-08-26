<?php

namespace WB\SDK\DTO\Responses\Cards;

use WB\SDK\DTO\Responses\BaseResponse;

class CardResponse extends BaseResponse
{
    public int $nmID;
    public int $imtID;
    public string $nmUUID;
    public int $subjectID;
    public string $subjectName;
    public string $vendorCode;
    public string $brand;
    public string $title;
    public string $description;
    public bool $needKiz;
    
    /** @var PhotoResponse[] */
    public array $photos = [];
    public ?string $video = null;
    public ?WholesaleResponse $wholesale = null;
    public ?DimensionsResponse $dimensions = null;
    
    /** @var CharacteristicResponse[] */
    public array $characteristics = [];
    
    /** @var SizeResponse[] */
    public array $sizes = [];
    
    /** @var TagResponse[] */
    public array $tags = [];
    
    public string $createdAt;
    public string $updatedAt;
}
