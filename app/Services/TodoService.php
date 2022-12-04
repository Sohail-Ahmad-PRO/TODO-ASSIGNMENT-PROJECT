<?php

namespace App\Services;

use App\Repositories\TodoRepository;

/**
 * Class TodoService
 * @package App\Services
 */
class TodoService
{
    /**
     * @var TodoRepository
     */
    protected TodoRepository $repository;

    /**
     * @param TodoRepository $repository
     */
    public function __construct(TodoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $title
     * @return mixed
     */
    public function list(string $title): mixed
    {
        return $this->repository->list($title);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed
    {
        return $this->repository->create($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id): mixed
    {
        return $this->repository->update($data, $id);
    }

    /**
     * @param int $id
     * @return bool|null
     */
    public function delete(int $id): ?bool
    {
        return $this->repository->delete($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id): mixed
    {
        return $this->repository->show($id);
    }
}
