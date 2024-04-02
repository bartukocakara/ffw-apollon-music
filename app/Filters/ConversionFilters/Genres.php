<?php

namespace App\Filters\ConversionFilters;

use App\Filters\FilterInterface;

class Genres implements FilterInterface
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * Uygulama methodu.
     *
     * @param string $value
     * @return void
    */
    public function handle($value): void
    {
        $this->query->whereJsonContains('genres', $value);
    }
}
