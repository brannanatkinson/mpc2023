<?php

namespace App\Livewire\Admin;
use Statamic\Facades\Entry;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

use Livewire\Component;

class BoardDashboard extends Component
{
    public function render()
    {
        $gift_items = Entry::query()->where('collection','items')->where('status', 'published')->get();
        
        $hosts = User::permission('edit host')
            ->orderBy('name')
            ->whereHas('campaigns', function( Builder $query){
                $query->where('year', '=', date('Y'));
            })
            ->get();
        return view('livewire.admin.board-dashboard', compact(['gift_items','hosts']))->layout('layouts.guest');
    }
}
