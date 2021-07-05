<?php

namespace App\Core\Repositories;

use App\Core\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }


    /**
     * @param $object
     * @param array $data
     * @return bool
     */
    public function updateRow($object, array $data): bool
    {
        return $object->update($data);
    }


    /**
     * @param string[] $columns
     * @param string $orderBy
     * @param string $sortBy
     * @param array $with
     * @return Builder
     */

    public function allQuery($columns = ['*'], string $orderBy = 'id', string $sortBy = 'decs', array $with = [])
    {
        return $this->model->orderBy($orderBy, $sortBy)->with([]);
    }

    /**
     * @param string[] $columns
     * @param string $orderBy
     * @param string $sortBy
     * @param array $with
     * @param int $paginate
     * @return Collection
     */

    public function all($columns = ['*'], string $orderBy = 'id', string $sortBy = 'asc', array $with = [], int $paginate = 0)
    {
        if ($paginate == 0) {
            return $this->allQuery()->get($columns);
        }
        return $this->allQuery()->paginate($paginate);

    }

    public function getWith(array $with = [])
    {
        return $this->model->with($with)->get();
    }

    /**
     * @param string $id
     * @return Collection
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param $id
     * @return Collection
     */
    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }


}
