<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ImageRepositoryInterface
{
    /**
     * Store image records in the database.
     *
     * @param array $imageData
     * @return Collection
     */
    public function storeImages(array $imageData): Collection;
}
