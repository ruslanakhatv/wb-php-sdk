<?php

namespace WB\SDK\Resources;

class WarehousesResource extends AbstractResource
{
    public function listWbOffices(): array
    {
        return $this->client->get('/api/v3/offices');
    }

    public function listWarehouses(): array
    {
        return $this->client->get('/api/v3/warehouses');
    }

    public function createWarehouse(string $name, int $officeId): array
    {
        return $this->client->post('/api/v3/warehouses', [
            'name' => $name,
            'officeId' => $officeId
        ]);
    }

    public function updateWarehouse(int $warehouseId, string $name, int $officeId): array
    {
        return $this->client->put("/api/v3/warehouses/{$warehouseId}", [
            'name' => $name,
            'officeId' => $officeId
        ]);
    }

    public function deleteWarehouse(int $warehouseId): array
    {
        return $this->client->delete("/api/v3/warehouses/{$warehouseId}");
    }

    public function getWarehouseContacts(int $warehouseId): array
    {
        return $this->client->get("/api/v3/dbw/warehouses/{$warehouseId}/contacts");
    }

    public function updateWarehouseContacts(int $warehouseId, array $contacts): array
    {
        return $this->client->put("/api/v3/dbw/warehouses/{$warehouseId}/contacts", [
            'contacts' => $contacts
        ]);
    }
}
