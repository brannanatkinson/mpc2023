<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UpdatePasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dash:update-passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change all passwords';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::permission('edit host')->where('created_at', '>', '2023-01-01')->get();
        foreach ( $users as $user ){
            $user->password = Hash::make('HousingHope2023');
            $user->save();
        }
    }
}
