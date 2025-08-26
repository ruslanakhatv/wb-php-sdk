<?php

namespace WB\SDK\Resources;

use WB\SDK\Clients\BaseClient;

abstract class AbstractResource
{
    protected BaseClient $client;

    public function __construct(BaseClient $client)
    {
        $this->client = $client;
    }
}
