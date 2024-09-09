<?php

namespace App\Livewire\Admin\Hosts;

use Livewire\Component;
use App\Models\Host;
use App\Models\User;
use App\Models\Campaign;
use App\Models\UserMeta;
use App\Mail\NewHost;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class AllHosts extends Component
{
    public $hosts;
    public $name;
    public $email;
    public $updateMode = false;

    protected $rules = [
        'name' => 'required|unique:users|min:6',
        'email' => 'required|email',
    ];


    public function mount()
    {
        $this->hosts = User::permission('edit host')->orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.admin.hosts.all-hosts');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->email = null;
    }
    public function store()
    {
        $this->validate();
        // $password_array = array("maryparrish2021","isupporthh2021","isupportmpc","mpcthanksyou");
        // $random_password = array_rad( $password_array, 1);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make( 'ILoveHousingHope' ),
            'host_url' => strtolower( preg_replace('/[[:space:]]+/', '-', $this->name) ),
        ]);
        $user->assignRole('host');
        $user->givePermissionTo('edit host');
        $year = date('Y');
        $user->campaigns()->attach( Campaign::where('year', '=', $year)->get() );
        $userMeta = UserMeta::create([
            'user_id' => $user->id,
        ]);

        Mail::to( $user->email )->send(new NewHost( $user ));

        $this->resetInput();
        $this->mount();
    }

    public function sendInviteEmail( $id )
    {
        $user = User::where('id', '=', $id)->first();
        Mail::to( $user->email )->send(new NewHost( $user ));
        $year = date('Y');
        $user->campaigns()->attach( Campaign::where('year', '=', $year)->get() );
        $this->mount();

    }
    public function resendInviteEmail( $id )
    {
        $user = User::where('id', '=', $id)->first();
        Mail::to( $user->email )->send(new NewHost( $user ));
        $this->mount();

    }
}
