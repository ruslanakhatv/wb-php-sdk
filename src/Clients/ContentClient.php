<?php

namespace WB\SDK\Clients;

use WB\SDK\Resources\CardsResource;
use WB\SDK\Resources\CategoriesResource;
use WB\SDK\Resources\TagsResource;
use WB\SDK\Resources\MediaResource;

class ContentClient extends BaseClient
{
    private const BASE_URL = 'https://content-api.wildberries.ru';

    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey, self::BASE_URL);
    }

    public function categories(): CategoriesResource
    {
        return new CategoriesResource($this);
    }

    public function cards(): CardsResource
    {
        return new CardsResource($this);
    }

    public function tags(): TagsResource
    {
        return new TagsResource($this);
    }

    public function media(): MediaResource
    {
        return new MediaResource($this);
    }
}
