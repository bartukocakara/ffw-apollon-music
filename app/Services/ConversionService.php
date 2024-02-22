<?php

namespace App\Services;

use App\Jobs\SoundrawMusicComposeJob;
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
        $data['user_id'] = auth()->user()->id;

        // Create and store the conversion record
        $conversion = $this->conversionRepository->create($data);

        // Dispatch the job
        SoundrawMusicComposeJob::dispatch($conversion);

        return $conversion;
    }

    public function delete($id): bool
    {
        $model = $this->conversionRepository->find($id);

        if ($model) {
            if ($model->music_path && Storage::disk('public')->exists($model->music_path)) {
                Storage::disk('public')->delete($model->music_path);
            }

            return $this->conversionRepository->delete($id);
        }

        return false;
    }



}
