<?php

namespace App\Services\Images;

use App\Services\Images\ImageServiceInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\ImageRepositoryInterface;

class ImageService implements ImageServiceInterface
{

    protected $imageRepository;

    public function __construct(ImageRepositoryInterface $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    /**
     * Upload multiple images and store their paths.
     *
     * @param array $images
     * @param int $productId
     * @param string $productName
     * @return Collection
     */
    public function uploadImages(array $images, int $productId, string $productName): Collection
    {
        $savedImages = collect();
        $imageData = [];

        foreach ($images as $index => $image) {
            if ($image instanceof UploadedFile) {
                // Generate image name as 'ProductName_1.jpg', 'ProductName_2.jpg'...
                $filename = strtolower(str_replace(' ', '_', $productName)) . '_' . ($index + 1) . '.' . $image->getClientOriginalExtension();

                // Save image in storage
                $path = $image->storeAs('images/products', $filename, 'public');

                // Prepare image data for database
                $imageData[] = [
                    'product_id' => $productId,
                    'image_path' => $path,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Save all images in the database using repository
        if (!empty($imageData)) {
            $savedImages = $this->imageRepository->storeImages($imageData);
        }

        return $savedImages;
    }
}
