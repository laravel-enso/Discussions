<?php

namespace LaravelEnso\Discussions\Http\Controllers\Discussion;

use Illuminate\Routing\Controller;
use LaravelEnso\Discussions\Http\Requests\ValidateDiscussionStore;
use LaravelEnso\Discussions\Http\Resources\Discussion as Resource;
use LaravelEnso\Discussions\Models\Discussion;

class Store extends Controller
{
    public function __invoke(ValidateDiscussionStore $request, Discussion $discussion)
    {
        $discussion->fill($request->validated())->save();

        $discussion->load([
            'createdBy.avatar', 'reactions.createdBy.avatar', 'replies.createdBy.avatar',
            'replies.reactions.createdBy.avatar',
        ]);

        return new Resource($discussion);
    }
}
