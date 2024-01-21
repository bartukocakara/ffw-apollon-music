<?php

namespace App\Services;

use App\Jobs\AsticaDescribeJob;
use App\Repositories\ConversionRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ConversionService extends CrudService
{
    protected ConversionRepository $conversionRepository;

    /**
     * @param ConversionRepository $conversionRepository
     * @return void
    */
    public function __construct(ConversionRepository $conversionRepository)
    {
        parent::__construct($conversionRepository); // Crud işlemleri yoksa kaldırınız.
        $this->conversionRepository = $conversionRepository;
    }

    /**
     * @param array $data
     * @return Model
    */
    public function store(array $data) : Model
    {
        $file = $data['image'];
        $uniqueFileName = uniqid('image_') . '.jpg';
        $destinationPath = 'uploads/img/' . $uniqueFileName;

        Storage::disk('public')->put($destinationPath, file_get_contents($file->getRealPath()));
        $imageBase64 = base64_encode(file_get_contents(storage_path('app/public/' . $destinationPath)));
        $conversion = $this->conversionRepository->create($data);
        AsticaDescribeJob::dispatch($conversion, [
                                        'image_base64' => $imageBase64,
                                        'destination_path' => $destinationPath
                                    ]);

        return $conversion;
    }

    public function delete($id) : bool
    {
        $model = $this->conversionRepository->find($id);

        if (Storage::disk('public')->exists($model->image_path)) {
            Storage::disk('public')->delete($model->image_path);
        }

        if (Storage::disk('public')->exists($model->music_path)) {
            Storage::disk('public')->delete($model->music_path);
        }

        return $this->conversionRepository->delete($id);
    }
}
