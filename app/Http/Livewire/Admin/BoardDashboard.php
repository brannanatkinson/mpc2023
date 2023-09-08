<?php

namespace App\Http\Livewire\Admin;
use Statamic\Facades\Entry;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

use Livewire\Component;

class BoardDashboard extends Component
{
    public $test;
    public $gift_items;
    public $hosts;

    public function mount()
    {
        //$this->test = 'brannan';
        $this->gift_items = Entry::query()->where('collection','items')->where('status', 'published')->get();
        $this->hosts = User::permission('edit host')
            ->orderBy('name')
            ->whereHas('campaigns', function( Builder $query){
                $query->where('year', '=', date('Y'));
            })
            ->get();
    }
    public function render()
    {
        return view('livewire.admin.board-dashboard') ->layout('layouts.guest');
    }
}
