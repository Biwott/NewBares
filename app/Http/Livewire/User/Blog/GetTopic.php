<?php

namespace App\Http\Livewire\User\Blog;

use Canvas\Canvas;
use Livewire\Component;
use Canvas\Models\Post;
use Canvas\Models\Topic;


class GetTopic extends Component
{
    public $data;


    public function mount(string $slug)
    {
        if (Topic::where('slug', $slug)->first()) {
            $this->data = [
                'posts' => Post::whereHas('topic', function ($query) use ($slug) {
                    $query->where('slug', $slug);
                })->published()->orderByDesc('published_at')->simplePaginate(10),
            ];
        } else {
            return;
        }
    }
    public function render()
    {
        return view('livewire.user.blog.get-topic', ['post' => $this->data]);
    }
}
