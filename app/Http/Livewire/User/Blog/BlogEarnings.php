<?php

namespace App\Http\Livewire\User\Blog;

use App\Models\Blogpay;
use Livewire\Component;
use Livewire\WithPagination;

class BlogEarnings extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $empty_message = 'No Earning History.';
    public $page_title = "Blog Earning History";


    public function render()
    {
        return view(
            'livewire.user.blog.blog-earnings',
            ['blogpays' => Blogpay::where('user_id', auth()->user()->id)->latest()->paginate(15)]
        );
    }
}
