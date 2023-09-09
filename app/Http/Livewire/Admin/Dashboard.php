<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Statamic\Facades\Entry;
use App\Models\User;
use App\Models\Item;
use Illuminate\Database\Eloquent\Builder;


class Dashboard extends Component
{
    public $test;
    public $gift_items;
    public $hosts;

    public function mount()
    {
        //$this->test = 'brannan';
        $this->gift_items = Entry::query()->where('collection','items')->where('status', 'published')->get();
        foreach ( $this->gift_items as $item ){
            // $item->sales()->count() > 0 ? $item->sales()->first()->quantity : 0
            $sales_count = Item::where('statamic_id', $item->id)->sales()->count();
            if ( $sales_count > 0 ){
                $item->put('sales', Item::where('statamic_id', $item->id)->sales()->first()->quantity() );
            } else {
                $item->put('sales', 0);
            }
        }
        $this->hosts = User::permission('edit host')
            ->orderBy('name')
            ->whereHas('campaigns', function( Builder $query){
                $query->where('year', '=', date('Y'));
            })
            ->get();
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
