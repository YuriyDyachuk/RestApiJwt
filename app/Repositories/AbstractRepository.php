<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractRepository
{
    /**
     * @var Model
     */
    protected Model $model;

    /**
     * @throws BindingResolutionException|BindingResolutionException
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __construct()
    {
        $this->model = app()->make($this->model());
    }

    abstract public function model(): string;

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        if (isset($this->query)) {
            return $this->query;
        }

        return $this->model->newQuery();
    }
}