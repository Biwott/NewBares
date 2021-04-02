<?php

namespace App\Http\Livewire\Admin\Blogs;

use App\Models\Blogpay;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserBlogpayHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Blog Earning History.';
    public $page_title = "Blog Earning History";
    public $user;
    public $username;

    public function mount($id)
    {
        $this->user = User::find($id);
        $this->username = $this->user->username;
    }
    public function render()
    {
        return view('livewire.admin.blogs.user-blogpay-history',  [
            'blogpays' => Blogpay::where('user_id', $this->user->id)->latest()->paginate(15),
        ])->layout('layouts.admin');;
    }
}
