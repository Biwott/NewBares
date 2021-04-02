<?php

namespace App\Http\Livewire\Admin\Blogs;

use Livewire\Component;

class RejectedBlogs extends Component
{
    public $empty_message = 'No Rejected Blogs Availables.';
    public function render()
    {
        return view('livewire.admin.blogs.rejected-blogs', [
            'posts' => \Canvas\Models\Post::where('published_at', '<=', now()->toDateTimeString())->where('status', 3)->orderByDesc('created_at')->paginate(4),
        ])->layout('layouts.admin');
    }
}
