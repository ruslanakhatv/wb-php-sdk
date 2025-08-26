<?php

namespace WB\SDK;

use WB\SDK\Clients\ContentClient;
use WB\SDK\Clients\PricesClient;
use WB\SDK\Clients\MarketplaceClient;

class WBAPI
{
    private string $apiKey;
    
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function content(): ContentClient
    {
        return new ContentClient($this->apiKey);
    }

    public function prices(): PricesClient
    {
        return new PricesClient($this->apiKey);
    }

    public function marketplace(): MarketplaceClient
    {
        return new MarketplaceClient($this->apiKey);
    }
}
