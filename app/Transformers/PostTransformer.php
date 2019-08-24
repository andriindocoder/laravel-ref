<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Post;

class PostTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Post $post)
    {
        return [
            'id'        => $post->id,
            'content'   => $post->content,
            'published' => $post->created_at->diffForHumans()
        ];
    }
}
