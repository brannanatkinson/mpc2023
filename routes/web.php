<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\BoardDashboard;
use App\Livewire\Admin\SponsorList;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::statamic('uri', 'view');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', Dashboard::class)->middleware(['auth:sanctum', 'verified'])->name('dashboard');
    Route::get('/admin/hosts', AllHosts::class)->middleware(['auth:sanctum', 'verified', 'can:admin'])->name('admin.hosts');
     Route::get('/admin/sponsors', SponsorList::class)->middleware(['auth:sanctum', 'verified', 'can:admin'])->name('admin.hosts');
    Route::get('/admin/hosts/passwordreset', AllHosts::class)->middleware(['auth:sanctum', 'verified', 'can:admin'])->name('admin.password');
    Route::get('/update/host', UpdateHostForm::class)->middleware(['auth:sanctum', 'verified', 'can:edit host'])->name('admin.update.hosts');
    
    // Routes to update statamic Categories, Items, and Sponsors
    Route::get('/admin/statamic', [DbApi::class, 'index']);
});
Route::get('/hosts/{url}', HostPublicPage::class);
Route::get('/mpc-board-dashboard', BoardDashboard::class);

Route::post('/webhook', WebhookConfirmation::class);
Route::get('/thankyou/{order_token}', OrderConfirmation::class);



