<?php

namespace App\Repositories;

use App\User;
use App\Post;

class PostRepository
{
    public function forUser(User $user)
    {
        $user_id = $user->id;
        return Post::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }

}
