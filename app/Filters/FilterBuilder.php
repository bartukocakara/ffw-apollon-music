<?php

namespace App\Filters;

use Illuminate\Support\Str;

class FilterBuilder
{
    protected $query;
    protected array $filters;
    protected string $namespace;
    public int $defaultPerPage = 10;
    public string $defaultSortField = 'created_at';
    public string $defaultSortOrder = 'desc';

    /**
     * FilterBuilder constructor.
     * @param $query
     * @param $filters
     * @param $namespace
     */
    public function __construct($query, $filters, $namespace)
    {
        $this->query = $query;
        $this->filters = $filters;
        $this->namespace = $namespace;
    }

    /**
     * @return mixed
     */
    public function apply(): mixed
    {
        foreach ($this->filters as $name => $value) {
            $normalizedName = ucfirst(Str::camel($name));
            $class = "App\Filters\\" . $this->namespace . "\\{$normalizedName}";
            if (!class_exists($class)) {
                continue;
            }
            if (is_string($value) && strlen($value)) {
                (new $class($this->query))->handle( $this->sanitizeInput($value));
            } elseif(is_array($value)) {
                (new $class($this->query))->handle($value);
            }
        }

        return  $this->paginating($this->query, $this->filters);

    }

    /**
     * @param $query
     * @param $filters
     * @return mixed
     */
    public function paginating($query, $filters): mixed
    {
        $searchArray['order_by'] = array_key_exists('order_by', $filters) ? $filters['order_by'] : $this->defaultSortField;
        $searchArray['order_sort'] = array_key_exists('order_sort', $filters) ? $filters['order_sort'] : $this->defaultSortOrder;
        $searchArray['per_page'] = array_key_exists('per_page', $filters) ? $filters['per_page'] : $this->defaultPerPage;
        return $query->orderBy($searchArray['order_by'], $searchArray['order_sort'])
            ->paginate($searchArray["per_page"]);

    }

        /**
     * Sanitizes user input to prevent SQL injection attacks
     *
     * @param string $input The user input to sanitize
     * @return string The sanitized input
     */
    protected function sanitizeInput(string $input): string
    {
        // Remove any potentially harmful characters
        $input = preg_replace("/[^\w\-]/", "", $input);

        // Escape special characters that could interfere with database queries
        $input = str_replace(array("'", "\"", "\\", "\0"), array("''", "", "\\\\", ""), $input);

        return $input;
    }
}
