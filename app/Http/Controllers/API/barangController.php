<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Barang;
use App\Transaksi;
use Illuminate\Http\Request;

class barangController extends Controller
{
    public function getBarang(Barang $barang)
    {
        $barangs = $barang->all();
        return response()->json($barangs);
    }

    public function getTransaksi(Transaksi $transaksi)
    {
        $trans = $transaksi->all();
        return response()->json($trans);
    }


}
