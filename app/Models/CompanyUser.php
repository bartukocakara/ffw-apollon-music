<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Filters\FilterBuilder;

class CompanyUser extends Model
{
    use HasFactory, UUID;

    protected $table = "company_users";

    protected $fillable = [
        'company_id',
        'user_id',
        'role'
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
        return (new FilterBuilder($query, $filters,'CompanyUserFilters'))->apply();
    }
}
