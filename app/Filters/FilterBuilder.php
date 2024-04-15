<?php

namespace App\Filters;
use Illuminate\Support\Str;

class FilterBuilder
{
    protected $query;
    protected $filters;
    protected $namespace;
    public $defaultPerPage = 10;
    public $defaultSortField = 'created_at';
    public $defaultSortOrder = 'desc';

    public function __construct($query, $filters, $namespace)
    {
        $this->query = $query;
        $this->filters = $filters;
        $this->namespace = $namespace;
    }

    public function apply()
    {
        foreach ($this->filters as $name => $value) {
            $class = "App\Filters\\".$this->namespace."\\".ucfirst(Str::camel($name));
            if (! class_exists($class)) {
                continue;
            }
            if (is_string($value) && strlen($value)) {
                (new $class($this->query))->handle($value);
            } elseif(is_array($value)) {
                (new $class($this->query))->handle($value);
            }
        }
        if(isset($this->filters['order_by'])) {
            $searchArray['order_sort'] = array_key_exists('order_sort', $this->filters) ? $this->filters['order_sort'] : $this->defaultSortOrder;
            $this->query = $this->query->orderBy($this->filters['order_by'], $searchArray['order_sort']);
        }
        return !empty($this->filters['per_page']) ? $this->paginating($this->query, $this->filters) : $this->query->get();
    }

    protected function paginating($query, $filters)
    {
        $searchArray['per_page'] = array_key_exists('per_page', $filters) ? $filters['per_page'] : $this->defaultPerPage;

        return $query->paginate($searchArray["per_page"]);
    }
}
