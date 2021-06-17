<?php

declare(strict_types=1);

namespace MiniFramework\Services;

use MiniFramework\Repositories\ExampleRepository;

class ExampleService
{
    private ExampleRepository $repository;

    public function __construct(ExampleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        // Business rule here.

        return $this->repository->index();
    }

    public function get(int $id)
    {
        // Business rule here.

        return $this->repository->get($id);
    }

    public function store(array $data)
    {
        // Business rule here.

        return $this->repository->store($data);
    }

    public function update(int $id, array $data)
    {
        // Business rule here.

        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        // Business rule here.

        return $this->repository->delete($id);
    }
}
