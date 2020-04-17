<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $fillable = [
        'name',
    ];

    public function user(){
        return $this->belongsToMany(User::class, 'users_moduls');   // class, table between 2 relation m2m
    }
}
