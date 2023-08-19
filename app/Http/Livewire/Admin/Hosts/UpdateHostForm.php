<?php

namespace App\Http\Livewire\Admin\Hosts;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UpdateHostForm extends Component
{
    use WithFileUploads;

    public $user, $image, $show_total, $goal, $show_goal, $show_items, $rationale, $show_rationale;
    public $password, $password_confirmation;
    public $msg_password_updated;
    public $show_alert = false;
    public function mount()
    {
        $this->user = User::find( auth()->user()->id );
        $this->goal = $this->user->UserMeta->goal;
        $this->show_total = $this->user->UserMeta->show_total;
        $this->show_goal = $this->user->UserMeta->show_goal;
        $this->show_items = $this->user->UserMeta->show_items;
        $this->rationale = $this->user->UserMeta->rationale;
        $this->show_rationale = $this->user->UserMeta->show_rationale;
        $this->image = $this->user->profile_photo_path;
    }
    public function render()
    {
        return view('livewire.admin.hosts.update-host-form');
    }

    public function saveUserPhoto()
    {
        $this->validate([
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:1024',
        ]);
        $photoPath = $this->image->store('public/photos/users');
        $user = DB::table('users')
            ->where('id', '=', $this->user->id )
            ->update([
                'profile_photo_path' => $photoPath,
            ]);
        $this->mount();
    }

    public function removeUserPhoto()
    {
        $user = DB::table('users')
            ->where('id', '=', $this->user->id )
            ->update([
                'profile_photo_path' => null,
            ]);
        $this->image = null;
        $this->mount();
    }

    public function saveUserShowTotal()
    {
        $this->show_total = !$this->show_total;
        $meta = DB::table('user_metas')
            ->where('user_id', '=', auth()->user()->id )
            ->update([
                'show_total' => $this->show_total,
            ]);
        $this->show_alert = true;
    }

    public function saveUserShowGoal()
    {
        $this->show_goal = !$this->show_goal;
        $meta = DB::table('user_metas')
            ->where('user_id', '=', auth()->user()->id )
            ->update([
                'show_goal' => $this->show_goal,
            ]);
    }

    public function saveUserGoal()
    {
        $meta = DB::table('user_metas')
            ->where('user_id', '=', auth()->user()->id )
            ->update([
                'goal' => $this->goal,
            ]);
    }

    public function saveUserShowItems()
    {
        $this->show_items = !$this->show_items;
        $meta = DB::table('user_metas')
            ->where('user_id', '=', auth()->user()->id )
            ->update([
                'show_items' => $this->show_items,
            ]);
    }

    public function saveUserShowRationale()
    {
        $this->show_rationale = !$this->show_rationale;
        $meta = DB::table('user_metas')
            ->where('user_id', '=', auth()->user()->id )
            ->update([
                'show_rationale' => $this->show_rationale,
            ]);
    }

    public function saveUserRationale()
    {
        $meta = DB::table('user_metas')
            ->where('user_id', '=', auth()->user()->id )
            ->update([
                'rationale' => $this->rationale,
            ]);
    }

    public function saveNewPassword()
    {
        $this->validate([
            'password' => 'required|confirmed',
        ]);
        $user = User::find( $this->user->id )->update([
            'password' => Hash::make( $this->password ),
        ]);
        $this->msg_password_updated = 1;
        return redirect('login');
    }


}
