<?php

namespace App\Repositories;

/**
 * Interface RepositoryContract.
 */
interface RepositoryContract
{
    public function all(array $columns = ['*']);

    public function count();

    public function create(array $data);

    public function createMultiple(array $data);

    public function delete();

    public function first(array $columns = ['*']);

    public function get(array $columns = ['*']);

    public function getById($id, array $columns = ['*']);

    public function getByColumn($item, $column, array $columns = ['*']);

    public function limit($limit);

    public function where($column, $value, $operator = '=');

    public function whereIn($column, $value);

    public function with($relations);
}
