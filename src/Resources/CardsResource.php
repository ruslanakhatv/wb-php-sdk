<?php

namespace WB\SDK\Resources;

use WB\SDK\Enums\ContentLanguage;

class CardsResource extends AbstractResource
{
    public function list(array $settings = [], ?ContentLanguage $locale = null): array
    {
        return $this->client->post('/content/v2/get/cards/list', $settings, [
            'query' => ['locale' => $locale?->value]
        ]);
    }

    public function getErrors(?ContentLanguage $locale = null): array
    {
        return $this->client->get('/content/v2/cards/error/list', [
            'locale' => $locale?->value
        ]);
    }

    public function update(array $cards): array
    {
        return $this->client->post('/content/v2/cards/update', $cards);
    }

    public function moveToTrash(array $nmIds): array
    {
        return $this->client->post('/content/v2/cards/delete/trash', [
            'nmIDs' => $nmIds
        ]);
    }

    public function recoverFromTrash(array $nmIds): array
    {
        return $this->client->post('/content/v2/cards/recover', [
            'nmIDs' => $nmIds
        ]);
    }

    public function getTrash(array $settings = [], ?ContentLanguage $locale = null): array
    {
        return $this->client->post('/content/v2/get/cards/trash', $settings, [
            'query' => ['locale' => $locale?->value]
        ]);
    }

    public function getLimits(): array
    {
        return $this->client->get('/content/v2/cards/limits');
    }

    public function generateBarcodes(int $count): array
    {
        return $this->client->post('/content/v2/barcodes', [
            'count' => $count
        ]);
    }

    public function create(array $cards): array
    {
        return $this->client->post('/content/v2/cards/upload', $cards);
    }

    public function createAndAttach(array $data): array
    {
        return $this->client->post('/content/v2/cards/upload/add', $data);
    }

    public function moveNms(array $data): array
    {
        return $this->client->post('/content/v2/cards/moveNm', $data);
    }
}

    // DTO методы
    public function createWithDTO(\WB\SDK\DTO\Requests\Cards\CardCreateRequest $request): array
    {
        return $this->create([$request->toArray()]);
    }

    public function listDTO(array $settings = [], ?ContentLanguage $locale = null): array
    {
        $response = $this->list($settings, $locale);
        return array_map(
            fn($item) => \WB\SDK\DTO\Responses\Cards\CardResponse::fromArray($item),
            $response['cards'] ?? []
        );
    }

    // DTO методы
    public function createWithDTO(\WB\SDK\DTO\Requests\Cards\CardCreateRequest $request): array
    {
        return $this->create([$request->toArray()]);
    }

    public function listDTO(array $settings = [], ?ContentLanguage $locale = null): array
    {
        $response = $this->list($settings, $locale);
        return array_map(
            fn($item) => \WB\SDK\DTO\Responses\Cards\CardResponse::fromArray($item),
            $response['cards'] ?? []
        );
    }
