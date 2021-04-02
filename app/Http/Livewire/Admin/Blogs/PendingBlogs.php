<?php

namespace App\Http\Livewire\Admin\Blogs;

use App\Models\Blogpay;
use App\Models\Publish;
use App\Models\User;
use Canvas\Models\Post;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class PendingBlogs extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $empty_message = 'No Pending Blogs Availables.';
    public $page_title = "List of Pending Blogs";
    public $search = '';
    public $amount = 200;

    public function approve(Post $post)
    {
        $post->update([
            'published_at' => Carbon::now()->toDateTimeString(),
            'status' => 1
        ]);
        $user = User::find($post->user_id);
        Blogpay::create([
            'user_id' => $user->id,
            'code' => setSessionId(),
            'post_id' => $post->id,
            'amount' =>  $this->amount,
            'status' => 1
        ]);
        $user->update([
            'balance' => $user->balance + $this->amount
        ]);
        return redirect()->route('admin.blogs.pending');
    }
    public function decline(Post $post)
    {
        $post->update([
            'status' => 3
        ]);
        return redirect()->route('admin.blog.pending');
    }
    public function render()
    {
        return view('livewire.admin.blogs.pending-blogs', [
            'posts' => \Canvas\Models\Post::where('published_at', '<=', now()->toDateTimeString())->where('status', 0)->orderByDesc('created_at')->paginate(4),
        ])->layout('layouts.admin');
    }
}
