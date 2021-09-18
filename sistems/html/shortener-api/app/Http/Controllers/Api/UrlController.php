<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUrlShortenedRequest;
use Illuminate\Container\Container;
use App\Services\UrlService;

class UrlController extends Controller
{
    private $service;

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Container\Container  $container
     */
    public function __construct(Container $container)
    {
        $this->service = $container->make(UrlService::class);
    }

    public function index()
    {
        return $this->service->getAll();
    }

    public function store(StoreUrlShortenedRequest $request)
    {
        return $this->service->store($request->validated());
    }
}
