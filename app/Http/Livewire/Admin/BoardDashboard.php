<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class BoardDashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.board-dashboard') ->layout('layouts.guest');
    }
}
