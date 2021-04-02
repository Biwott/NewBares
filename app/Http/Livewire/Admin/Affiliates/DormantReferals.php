<?php

namespace App\Http\Livewire\Admin\Affiliates;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DormantReferals extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $empty_message = 'No Available Referals.';
    public $page_title = "List of Dormant Referals";
    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.affiliates.all', [
            'users' =>

            User::where('username', $this->search)->exists()
                ? User::where('active', 0)->where('referer_id', User::where('username', $this->search))->latest()->paginate(10)
                : ($this->search != ''
                    ? User::where('referer_id', 99999999999)->latest()->paginate(10)
                    : User::where('active', 0)->where('referer_id', '!=', 0)->latest()->paginate(10))
        ])->layout('layouts.admin');
    }
}
