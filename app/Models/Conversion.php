<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Filters\FilterBuilder;

class Conversion extends Model
{
    use HasFactory, UUID;

    protected $table = 'conversions';

    protected $fillable = [
        'user_id',
        'music_path',
        'image_path',
        'genres',
        'themes',
        'length',
        'tempo'
    ];

    protected $casts = [
        'genres' => 'array',
        'themes' => 'array',
    ];

    /**
     * Filter için scope oluşturuyoruz.
     *
     * @param $query
     * @param array $filters
     * @return Collection|LengthAwarePaginator
     */
    public function scopeFilterBy($query, array $filters) : Collection|LengthAwarePaginator
    {
        return (new FilterBuilder($query, $filters,'ConversionFilters'))->apply();
    }
}
