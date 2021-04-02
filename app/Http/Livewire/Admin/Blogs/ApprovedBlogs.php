<?php

namespace App\Http\Livewire\Admin\Blogs;

use Livewire\Component;

class ApprovedBlogs extends Component
{
    public $empty_message = 'No Approved Blogs Availables.';


    public function render()
    {
        return view('livewire.admin.blogs.approved-blogs',  [
            'posts' => \Canvas\Models\Post::where('published_at', '<=', now()->toDateTimeString())->where('status', 1)->orderByDesc('created_at')->paginate(4),
        ])->layout('layouts.admin');
    }
}
