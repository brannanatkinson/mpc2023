<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'year'
    ];

    public function hosts()
    {
        return $this->belongsToMany(User::class)->orderBy('name');
    }
}
