<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\order;
use App\stock;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role != 0) {
            $orders = DB::table('orders')
                    ->join('users', 'orders.idUser', '=', 'users.id')
                    ->join('products', 'orders.idProduct', '=', 'products.id')
                    ->select('products.type','products.category', 'orders.quantity')
                    ->where('orders.idUser', '=', Auth::user()->id)
                    ->get();
            // dd($stocks);
        } else {
            $orders = DB::table('orders')
                    ->join('users', 'orders.idUser', '=', 'users.id')
                    ->join('products', 'orders.idProduct', '=', 'products.id')
                    ->select('users.name', 'users.alamat', 'users.telp', 'products.type','products.category', 'orders.quantity')
                    ->get();
        }

        return view('transaksi', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function orderIndex($id){
        $order = stock::findOrfail($id);
        // dd($order);
        return view('order', ['id' => $id, 'stok' => $order->stock]);
    }

    public function order(Request $req)
    {
        $this->validate($req,[
            'jumlah' => 'required',
            'alamat' => 'required|string',
            'tanggal' => 'required',
        ]);

        // $date = Carbon::now();
        // $carbon = Carbon::createFromFormat('Y-m-d H:i:s', $date, 'UTC');
        // $carbon->tz = 'Asia/Jakarta';

        $order = new order;
        $order->idProduct = $req->id;
        $order->quantity = $req->jumlah;
        $order->orderDate = $req->tanggal;
        $order->idUser = $req->idUser;
        $order->address = $req->alamat;
        $order->save();

        return $this->minStock($req->id, $req->jumlah);
        // dd($order, stock::findOrfail($req->id));
    }

    public function minStock($id, $quantity){
        $prod = stock::findOrfail($id);
        $count = $prod->stock - $quantity;
        $prod->update([
            'stock' => $count
        ]);

        return redirect('/transaksi/pemesanan');
    }

    public function plusStock($id, $quantity){
        $prod = stock::findOrfail($id);
        $count = $prod->stock + $quantity;
        $prod->update([
            'stock' => $count
        ]);

        return redirect('/transaksi/pemesanan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
