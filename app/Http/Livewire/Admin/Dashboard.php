<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Statamic\Facades\Entry;

class Dashboard extends Component
{
    public $test;

    public function mount()
    {
        $this->test = 'rumple';
        //$this->gift_items = Entry::query()->where('collection','items')->get();
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
