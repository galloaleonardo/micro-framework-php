<?php

declare(strict_types=1);

namespace MiniFramework\Controllers;

use MiniFramework\Template\Renderer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WelcomeController
{

    private Request $request;
    private Response $response;
    private Renderer $renderer;

    public function __construct(Request $request, Response $response, Renderer $renderer)
    {
        $this->request = $request;
        $this->response = $response;
        $this->renderer = $renderer;
    }

    public function index()
    {
        $html = $this->renderer->render('index.html');
        
        $this->response->setContent($html);
    }

    public function post($params)
    {
        $request = $this->request->query;

        var_dump($request);
        die();
    }
}
