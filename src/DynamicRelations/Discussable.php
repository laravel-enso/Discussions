<?php

namespace LaravelEnso\Discussions\DynamicRelations;

use Closure;
use LaravelEnso\Discussions\Models\Discussion;
use LaravelEnso\DynamicMethods\Contracts\Method;

class Discussable implements Method
{
    public function name(): string
    {
        return 'discussions';
    }

    public function closure(): Closure
    {
        return fn () => $this->morphMany(Discussion::class, 'discussable');
    }
}
