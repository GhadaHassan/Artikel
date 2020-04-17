<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = [
        'name',
        'username',
        'password',
        'old_password',
        'link',
        'note',
        'modul_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function modul(){
        return $this->belongsTo(Modul::class, 'modul_id');
    }
}
