<?php

namespace App\Services\Images;

use Illuminate\Database\Eloquent\Collection;

interface ImageServiceInterface
{
    /**
     * Handle image upload logic.
     *
     * @param array $images
     * @param int $productId
     * @param string $productName
     * @return Collection
     */
    public function uploadImages(array $images, int $productId, string $productName): Collection;
}
