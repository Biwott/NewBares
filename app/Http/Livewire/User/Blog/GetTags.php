<?php

namespace App\Http\Livewire\User\Blog;

use Livewire\Component;
use Canvas\Models\Tag;
use Canvas\Models\Post;

class GetTags extends Component
{

    public $data;

    public function mount(string $slug)
    {
        if (Tag::where('slug', $slug)->first()) {
            $this->data = [
                'posts' => Post::whereHas('tags', function ($query) use ($slug) {
                    $query->where('slug', $slug);
                })->published()->orderByDesc('published_at')->simplePaginate(10),
            ];

        } else {
            return;
        }
    }


    public function render()
    {
        return view('livewire.user.blog.index', ['post' => $this->data]);
    }
}
