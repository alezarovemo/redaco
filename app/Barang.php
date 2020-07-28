<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Barang extends Model
{
    use Notifiable;


    protected $fillable = [
        'nama', 'qty', 'harga',
    ];

    
    protected $hidden = [
        
    ];

    public function transaksi() 
    {
        return $this->hasMany(Transaksi::class, 'id_barang');
    }
   
}
