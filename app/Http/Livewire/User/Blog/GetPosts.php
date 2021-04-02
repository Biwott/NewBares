<?php

namespace App\Http\Livewire\User\Blog;

use Livewire\Component;
use Canvas\Models\Post;

class GetPosts extends Component
{


    public function render()
    {
        return view('livewire.user.blog.show', [
            'posts' => Post::published()->orderByDesc('published_at')->simplePaginate(10),
        ]);
    }
}
