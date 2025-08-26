<?php

namespace WB\SDK\Resources;

class MediaResource extends AbstractResource
{
    public function uploadFile(int $nmId, int $photoNumber, string $filePath): array
    {
        // Реализация загрузки файла через multipart/form-data
        // Это упрощенная версия, реальная реализация потребует работы с multipart
        return $this->client->post('/content/v3/media/file', [
            'nmID' => $nmId,
            'photoNumber' => $photoNumber,
            'file' => $filePath
        ]);
    }

    public function uploadByUrls(int $nmId, array $urls): array
    {
        return $this->client->post('/content/v3/media/save', [
            'nmId' => $nmId,
            'data' => $urls
        ]);
    }
}
