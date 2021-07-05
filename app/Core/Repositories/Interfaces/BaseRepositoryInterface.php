<?php

namespace App\Core\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function create(array $attributes);

    public function updateRow($object, array $attributes): bool;

    public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc', array $with = [], int $paginate = 0);

    public function find($id);

    public function findOrFail($id);

    public function getWith(array $with = []);

}
