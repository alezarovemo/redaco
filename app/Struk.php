<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Struk extends Model
{
    use Notifiable;


    protected $fillable = [
        'user_id', 'nama_user', 'tgl', 'waktu',
    ];

    
    protected $hidden = [
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
