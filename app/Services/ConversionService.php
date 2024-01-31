<?php

namespace App\Services;

use App\Jobs\AsticaDescribeJob;
use App\Repositories\ConversionRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ConversionService extends CrudService
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected ConversionRepository $conversionRepository;

    /**
     * @param ConversionRepository $conversionRepository
     * @return void
    */
    public function __construct(ConversionRepository $conversionRepository)
    {
        // Extend ettiğimiz CrudService'in __construct methoduna repositoryi gönderiyoruz.
        parent::__construct($conversionRepository); // Crud işlemleri yoksa kaldırınız.
        // Repository bu serviste kullanılmak üzere değişkene tanımlanıyor.
        $this->conversionRepository = $conversionRepository;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model
    {
        $file = $data['image'];
        $uniqueFileName = uniqid('image_') . '.jpg';
        $destinationPath = 'uploads/img/' . $uniqueFileName;
        $data['user_id'] = auth()->user()->id;

        // Get the original image dimensions
        list($originalWidth, $originalHeight) = getimagesize($file->getPathname());

        // Set the maximum width and calculate the new height to maintain the aspect ratio
        $maxWidth = 800; // Adjust this value as needed
        $newWidth = min($originalWidth, $maxWidth);
        $newHeight = ($newWidth / $originalWidth) * $originalHeight;

        // Create a new image with the specified dimensions
        $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
        // Load the original image
        $originalImage = imagecreatefromjpeg($file->getPathname());

        // Resize the original image to the new dimensions
        imagecopyresampled($resizedImage, $originalImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

        // Save the resized image to storage
        $resizedImagePath = storage_path('app/public/' . $destinationPath);
        imagejpeg($resizedImage, $resizedImagePath);

        // Get base64 encoding of the resized image
        $imageBase64 = base64_encode(file_get_contents($resizedImagePath));

        // Free up memory
        imagedestroy($resizedImage);
        imagedestroy($originalImage);
        $data['image_path'] = $destinationPath;

        // Create and store the conversion record
        $conversion = $this->conversionRepository->create($data);

        // Dispatch the job
        AsticaDescribeJob::dispatch($conversion, [
            'image_base64' => $imageBase64,
            'destination_path' => $destinationPath
        ]);

        return $conversion;
    }



    public function delete($id): bool
    {
        $model = $this->conversionRepository->find($id);

        if ($model) {
            if ($model->image_path && Storage::disk('public')->exists($model->image_path)) {
                Storage::disk('public')->delete($model->image_path);
            }

            if ($model->music_path && Storage::disk('public')->exists($model->music_path)) {
                Storage::disk('public')->delete($model->music_path);
            }

            return $this->conversionRepository->delete($id);
        }

        return false;
    }

}
