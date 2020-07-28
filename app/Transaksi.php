<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transaksi extends Model
{
    use Notifiable;


    protected $fillable = [
        'user_id', 'nama', 'qty', 'harga', 'total',
    ];

    
    protected $hidden = [
        
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class,'id_barang','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
