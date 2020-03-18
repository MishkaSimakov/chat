<?php

namespace App\Http\Controllers\Api;

use App\Conversation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCovnersationUserRequest;
use App\Transformers\ConversationTransformer;
use Illuminate\Http\Request;

class ConversationUserController extends Controller
{
    public function store(Conversation $conversation, StoreCovnersationUserRequest $request)
    {
        $this->authorize('affect', $conversation);

        $conversation->users()->syncWithoutDetaching($request->recipients);

        $conversation->load(['users']);

        return fractal()
            ->item($conversation)
            ->parseIncludes(['user', 'users'])
            ->transformWith(new ConversationTransformer())
            ->toArray();
    }
}
