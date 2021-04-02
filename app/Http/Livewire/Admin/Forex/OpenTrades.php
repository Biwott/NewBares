<?php

namespace App\Http\Livewire\Admin\Forex;

use App\Models\Forex;
use App\Models\Market;
use App\Models\Pair;
use App\Models\Trade;
use App\Models\Tradepack;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class OpenTrades extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $empty_message = 'No Available Forex.';
    public $page_title = "List of All Forex Projections";


    public $search = '';
    public $phone_checked = '';
    public $username = '';
    public $phone = '';

    public function updatedSearch()
    {
        if ($this->phone_checked == 1) {
            $this->username = '';
            $this->phone = $this->search;
        } else {
            $this->username = $this->search;
            $this->phone = '';
        }
        $this->resetPage();
    }

    public function render()
    {
        return view(
            'livewire.admin.forex.open-trades',
            [
                'trades' => User::where('username', $this->search)->exists()
                    ?  Trade::where('user_id', User::where('username', $this->search)->first()->id)->where('status', 1)->orderBy('opened_at', 'DESC')->paginate(15)
                    : ($this->search != ''
                        ? Trade::where('id', 0)->paginate(15)
                        : Trade::where('status', 1)->orderBy('opened_at', 'DESC')->paginate(15))
            ]
        )->layout('layouts.admin');
    }
}
