<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;



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
        $users = User::permission('edit host')
            ->whereHas('campaigns', function( Builder $query){
                $query->where('year', '=', date('Y'));
            })
            ->get();
        foreach ( $users as $user ){
            $user->password = Hash::make('HousingHope2023');
            $user->save();
        }
    }
}
