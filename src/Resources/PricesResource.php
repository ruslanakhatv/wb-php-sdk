<?php

namespace WB\SDK\Resources;

class PricesResource extends AbstractResource
{
    public function setPrices(array $goods): array
    {
        return $this->client->post('/api/v2/upload/task', [
            'data' => $goods
        ]);
    }

    public function setSizePrices(array $sizeGoods): array
    {
        return $this->client->post('/api/v2/upload/task/size', [
            'data' => $sizeGoods
        ]);
    }

    public function setClubDiscounts(array $discounts): array
    {
        return $this->client->post('/api/v2/upload/task/club-discount', [
            'data' => $discounts
        ]);
    }

    public function getTaskHistory(int $uploadId): array
    {
        return $this->client->get('/api/v2/history/tasks', [
            'uploadID' => $uploadId
        ]);
    }

    public function getTaskGoods(int $uploadId, int $limit = 1000, int $offset = 0): array
    {
        return $this->client->get('/api/v2/history/goods/task', [
            'uploadID' => $uploadId,
            'limit' => $limit,
            'offset' => $offset
        ]);
    }

    public function getGoodsWithPrices(array $filter = [], int $limit = 1000, int $offset = 0): array
    {
        $params = array_merge($filter, [
            'limit' => $limit,
            'offset' => $offset
        ]);
        
        return $this->client->get('/api/v2/list/goods/filter', $params);
    }

    public function getSizePrices(int $nmId, int $limit = 1000, int $offset = 0): array
    {
        return $this->client->get('/api/v2/list/goods/size/nm', [
            'nmID' => $nmId,
            'limit' => $limit,
            'offset' => $offset
        ]);
    }

    public function getQuarantineGoods(int $limit = 1000, int $offset = 0): array
    {
        return $this->client->get('/api/v2/quarantine/goods', [
            'limit' => $limit,
            'offset' => $offset
        ]);
    }
}
