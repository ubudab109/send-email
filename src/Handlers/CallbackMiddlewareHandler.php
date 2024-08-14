<?php

namespace Src\Handlers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CallbackMiddlewareHandler implements RequestHandlerInterface
{
    private $callback;

    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return call_user_func_array($this->callback, [$request]);
    }
}
