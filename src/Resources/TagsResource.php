<?php

namespace WB\SDK\Resources;

use WB\SDK\Enums\TagColor;

class TagsResource extends AbstractResource
{
    public function list(): array
    {
        return $this->client->get('/content/v2/tags');
    }

    public function create(string $name, TagColor $color): array
    {
        return $this->client->post('/content/v2/tag', [
            'name' => $name,
            'color' => $color->value
        ]);
    }

    public function update(int $id, string $name, TagColor $color): array
    {
        return $this->client->patch("/content/v2/tag/{$id}", [
            'name' => $name,
            'color' => $color->value
        ]);
    }

    public function delete(int $id): array
    {
        return $this->client->delete("/content/v2/tag/{$id}");
    }

    public function manageCardTags(int $nmId, array $tagIds): array
    {
        return $this->client->post('/content/v2/tag/nomenclature/link', [
            'nmID' => $nmId,
            'tagsIDs' => $tagIds
        ]);
    }
}
