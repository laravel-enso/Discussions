<?php

namespace LaravelEnso\Discussions\Observers;

use LaravelEnso\Discussions\Exceptions\DiscussionConflict;

class Observer
{
    private function deleting()
    {
        if (config('enso.discussions.onDelete') === 'restrict'
            && $this->discussions()->exists()) {
            throw DiscussionConflict::delete();
        }
    }

    private function deleted()
    {
        if (config('enso.discussions.onDelete') === 'cascade') {
            $this->discussions()->delete();
        }
    }
}
