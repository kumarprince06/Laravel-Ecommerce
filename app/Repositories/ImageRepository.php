<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ImageRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

use App\Models\Image;

class ImageRepository implements ImageRepositoryInterface
{
    /**
     * Store multiple images in the database.
     *
     * @param array $imageData
     * @return Collection
     */
    public function storeImages(array $imageData): Collection
    {
        Image::insert($imageData);
        return Image::whereIn('name', array_column($imageData, 'name'))->get();
    }
}
