<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\User;
use App\Transformers\PostTransformer;

class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'posts'
    ];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id'         => $user->id,
            'name'       => $user->name,
            'email'      => $user->email,
            'registered' => $user->created_at->diffForHumans()
        ];
    }

    public function includePosts(User $user){
        $posts = $user->posts;

        return $this->collection($posts, new PostTransformer);
    }
}
