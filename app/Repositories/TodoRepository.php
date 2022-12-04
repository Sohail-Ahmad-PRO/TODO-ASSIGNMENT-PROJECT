<?php

namespace App\Repositories;

use App\Models\Todo;

/**
 * Class TodoRepository
 * @package App\Repositories
 */
class TodoRepository
{
    /**
     * @var Todo
     */
    protected Todo $model;

    /**
     * @param Todo $model
     */
    public function __construct(Todo $model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function list(): mixed
    {
        return $this->model->paginate(10);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id): mixed
    {
        $this->model->where('id', $id)->update($data);
        return $this->model->find($id);
    }

    /**
     * @param int $id
     * @return bool|null
     */
    public function delete(int $id): ?bool
    {
        return $this->model->where('id', $id)->delete();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id): mixed
    {
        return $this->model->find($id);
    }
}
