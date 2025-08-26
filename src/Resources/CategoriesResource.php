<?php

namespace WB\SDK\Resources;

use WB\SDK\Enums\ContentLanguage;

class CategoriesResource extends AbstractResource
{
    public function getParentCategories(?ContentLanguage $locale = null): array
    {
        return $this->client->get('/content/v2/object/parent/all', [
            'locale' => $locale?->value
        ]);
    }

    public function getSubjects(array $params = []): array
    {
        return $this->client->get('/content/v2/object/all', $params);
    }

    public function getSubjectCharacteristics(int $subjectId, ?ContentLanguage $locale = null): array
    {
        return $this->client->get("/content/v2/object/charcs/{$subjectId}", [
            'locale' => $locale?->value
        ]);
    }

    public function getColors(?ContentLanguage $locale = null): array
    {
        return $this->client->get('/content/v2/directory/colors', [
            'locale' => $locale?->value
        ]);
    }

    public function getGenders(?ContentLanguage $locale = null): array
    {
        return $this->client->get('/content/v2/directory/kinds', [
            'locale' => $locale?->value
        ]);
    }

    public function getCountries(?ContentLanguage $locale = null): array
    {
        return $this->client->get('/content/v2/directory/countries', [
            'locale' => $locale?->value
        ]);
    }

    public function getSeasons(?ContentLanguage $locale = null): array
    {
        return $this->client->get('/content/v2/directory/seasons', [
            'locale' => $locale?->value
        ]);
    }

    public function getVatRates(?ContentLanguage $locale = null): array
    {
        return $this->client->get('/content/v2/directory/vat', [
            'locale' => $locale?->value
        ]);
    }

    public function getTnvedCodes(int $subjectId, ?int $search = null, ?ContentLanguage $locale = null): array
    {
        return $this->client->get('/content/v2/directory/tnved', [
            'subjectID' => $subjectId,
            'search' => $search,
            'locale' => $locale?->value
        ]);
    }
}

    // DTO методы
    public function getParentCategoriesDTO(?ContentLanguage $locale = null): array
    {
        $response = $this->getParentCategories($locale);
        return array_map(
            fn($item) => \WB\SDK\DTO\Responses\Categories\ParentCategoryResponse::fromArray($item),
            $response['data'] ?? []
        );
    }

    public function getSubjectsDTO(array $params = []): array
    {
        $response = $this->getSubjects($params);
        return array_map(
            fn($item) => \WB\SDK\DTO\Responses\Categories\SubjectResponse::fromArray($item),
            $response['data'] ?? []
        );
    }

    public function getSubjectCharacteristicsDTO(int $subjectId, ?ContentLanguage $locale = null): array
    {
        $response = $this->getSubjectCharacteristics($subjectId, $locale);
        return array_map(
            fn($item) => \WB\SDK\DTO\Responses\Categories\CharacteristicResponse::fromArray($item),
            $response['data'] ?? []
        );
    }
