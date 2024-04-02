<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Conversion extends Model
{
    use HasFactory, UUID;

    protected $table = 'conversions';

    protected $fillable = [
        'user_id',
        'music_path',
        'moods',
        'genres',
        'themes',
        'length',
        'tempo',
        'status',
        'is_favorite'
    ];

    protected $casts = [
        'genres' => 'array',
        'themes' => 'array',
        'moods' => 'array',
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

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
