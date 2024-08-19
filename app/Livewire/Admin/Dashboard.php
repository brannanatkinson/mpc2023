<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Statamic\Facades\Entry;
use App\Models\User;
use App\Models\Item;
use Illuminate\Database\Eloquent\Builder;


class Dashboard extends Component
{



    public function render()
    {
        $gift_items = Entry::query()
            ->where('collection','items')
            ->whereStatus('published')
            ->get();
        foreach ( $gift_items as $gift )
        {
            ray( Item::where('statamic_id', $gift->id)->first()->sales()->count() );
        }
        dd( $gift_items );
        $hosts = User::permission('edit host')
            ->orderBy('name')
            ->whereHas('campaigns', function( Builder $query){
                $query->where('year', '=', date('Y'));
            })
            ->get();

        return view('livewire.admin.dashboard', compact(['gift_items', 'hosts']));
    }
}
