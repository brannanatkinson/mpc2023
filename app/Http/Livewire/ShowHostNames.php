<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;


class ShowHostNames extends Component
{
    public $hosts;
    public function mount()
    {
        $this->hosts = User::permission('edit host')
            ->orderBy('name')
            ->whereHas('campaigns', function( Builder $query){
                $query->where('year', '=', date('Y'));
            })
            ->get();
    }
    public function render()
    {
        return view('livewire.show-host-names');
    }
}
