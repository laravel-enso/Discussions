<?php

namespace LaravelEnso\Discussions\Services;

use LaravelEnso\Discussions\DynamicRelations\Discussable as Relation;
use LaravelEnso\Discussions\Observers\Observer;
use LaravelEnso\DynamicMethods\Services\Methods;

class Discussable
{
    public static function register(string $model)
    {
        Methods::bind($model, [Relation::class]);
        $model::observe(Observer::class);
    }
}
