<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\stock;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ayam = DB::table('products')
                    ->select('type', 'stock', 'price', 'id')
                    ->where('category', '=', 'ayam')
                    ->orderBy('stock', 'DESC')
                    ->paginate(5);
                    // dd($stocks);

        $telur = DB::table('products')
                    ->select('type', 'stock', 'price', 'id')
                    ->where('category', '=', 'telur')
                    ->orderBy('stock', 'DESC')
                    ->paginate(5);
        return view('Stock', ['ayam' => $ayam, 'telur' => $telur]);
    }

    // public function addIndex()
    // {
    //     return view('addStock');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cat)
    {
        return view('addStock', ['cat' => $cat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $this->validate($req,[
            'nama' => 'required|unique:stocks',
            'stok' => 'required',
            'harga' => 'required',
        ]);

        $stok = new stock;
        $stok->type = $req->nama;
        $stok->stock = $req->stok;
        $stok->price = $req->harga;
        $stok->category = $req->kat;
        $stok->save();

        return redirect('/Stock');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = stock::find($id);
        $stock->delete();

        return redirect('/Stock');
    }
}
