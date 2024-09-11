<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\BoardDashboard;
use App\Livewire\Admin\Hosts\AllHosts;
use App\Livewire\Admin\Hosts\UpdateHostForm;
use App\Livewire\Hosts\HostPublicPage;
use App\Livewire\WebhookConfirmation;
use App\Livewire\OrderConfirmation;
use App\Http\Controllers\DbApi;
use Illuminate\Support\Facades\Http;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});





