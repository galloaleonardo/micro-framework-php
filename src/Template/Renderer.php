<?php

declare(strict_types=1);

namespace MiniFramework\Template;

interface Renderer
{
    public function render($template, $data = []): string;
}
