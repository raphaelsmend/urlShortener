<?php

namespace App\Repositories;

use App\Models\Url;

class UrlRepository
{
    private $model;

    public function __construct(Url $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->active()->get();
    }

    public function getByShortened(String $urlShortened)
    {
        return $this->model->where("url_shortened", $urlShortened)->first();
    }

    public function create(Array $fields)
    {
        return $this->model->create($fields);
    }
}
