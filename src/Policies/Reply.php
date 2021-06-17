<?php

namespace LaravelEnso\Discussions\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use LaravelEnso\Discussions\Models\Reply as Model;
use LaravelEnso\Users\Models\User;

class Reply
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin() || $user->isSupervisor()) {
            return true;
        }
    }

    public function handle(User $user, Model $reply)
    {
        return $user->id === (int) $reply->created_by;
    }
}
