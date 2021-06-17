<?php

declare(strict_types=1);

namespace MiniFramework\Controllers;

use MiniFramework\Services\ExampleService;
use MiniFramework\Template\Renderer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ExampleController
{
    private Request $request;
    private Response $response;
    private Renderer $renderer;
    private ExampleService $service;

    public function __construct(Request $request, Response $response, Renderer $renderer, ExampleService $service)
    {
        $this->request = $request;
        $this->response = $response;
        $this->renderer = $renderer;
        $this->service = $service;
    }

    public function index()
    {
        $data = $this->service->index();

        return $this->response->setContent($data);
    }

    public function get($args)
    {
        $id = (int) $args['example'];

        $data = $this->service->get($id);

        return $this->response->setContent($data);
    }

    public function store($data)
    {
        $data = $this->request->toArray();

        $stored = $this->service->store($data);

        return $this->response->setContent($stored);
    }

    public function update($args)
    {
        $id = (int) $args['example'];
        $data = $this->request->toArray();

        $updated = $this->service->update((int) $id, (array) $data);

        return $this->response->setContent($updated);
    }

    public function delete($args)
    {
        $id = (int) $args['example'];

        $destroyed = $this->service->delete((int) $id);

        return $this->response->setContent($destroyed);
    }
}
