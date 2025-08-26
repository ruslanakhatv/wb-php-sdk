<?php

namespace WB\SDK\Resources;

class StocksResource extends AbstractResource
{
    public function updateStocks(int $warehouseId, array $stocks): array
    {
        return $this->client->put("/api/v3/stocks/{$warehouseId}", [
            'stocks' => $stocks
        ]);
    }

    public function deleteStocks(int $warehouseId, array $skus): array
    {
        return $this->client->delete("/api/v3/stocks/{$warehouseId}", [
            'skus' => $skus
        ]);
    }

    public function getStocks(int $warehouseId, array $skus): array
    {
        return $this->client->post("/api/v3/stocks/{$warehouseId}", [
            'skus' => $skus
        ]);
    }
}

    // DTO методы
    public function updateStocksDTO(array $stockRequests, int $warehouseId): array
    {
        $stocks = array_map(fn($request) => $request->toArray(), $stockRequests);
        return $this->updateStocks($warehouseId, $stocks);
    }

    public function getStocksDTO(int $warehouseId, array $skus): array
    {
        $response = $this->getStocks($warehouseId, $skus);
        return array_map(
            fn($item) => \WB\SDK\DTO\Responses\Stocks\StockResponse::fromArray($item),
            $response['stocks'] ?? []
        );
    }
