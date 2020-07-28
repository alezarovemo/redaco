<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Transaksi;
use App\User;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $trans = Transaksi::all();
        return view ('transaksi.index')->with([
            'trans' => $trans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Transaksi::all();
        return view ('transaksi.create')->with([
            'items' => $items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|max:255',
            'nama' => 'required|max:255',
            'qty' => 'required|integer',
            'harga' => 'required|integer',
            'total' => 'required|integer',
        ]);

        $data = $request->all();
        Transaksi::create($data);
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tran = Transaksi::findOrFail($id);

        return view('transaksi.detail')->with([
            'tran' => $tran
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tran = Transaksi::findOrFail($id);

        return view('transaksi.edit')->with([
            'tran' => $tran
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $tran = Transaksi::findOrFail($id);
        $tran->update($data);

        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tran = Transaksi::findOrFail($id);
        $tran->delete();

        return redirect()->route('transaksi.index');
    }
}
