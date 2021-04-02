<?php

namespace App\Http\Livewire\User\Blog;

use Livewire\Component;
use Canvas\Models\Post;

class GetSlug extends Component
{
    public $data;
    public function mount(string $slug)
    {
        $posts = Post::with('tags', 'topic')->published()->get();
        $post = $posts->firstWhere('slug', $slug);

        if (optional($post)->published) {
            $this->data = [
                'author' => $post->user,
                'post'   => $post,
                'meta'   => $post->meta,
            ];

            // IMPORTANT: This event must be called for tracking visitor/view traffic
            event(new \Canvas\Events\PostViewed($post));
        } else {
            return;
        }
    }

    public function render()
    {
        return view('livewire.user.blog.show', ['post' => $this->data]);
    }
}
