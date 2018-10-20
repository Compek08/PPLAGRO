<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::check());
        return view('profile');
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
        $this->validate($request,[
            'nama' => 'required',
            'nik' => 'required|unique:users|max:16|min:16',
            'alamat' => 'required|unique:users|',
            'email' => 'required|unique:users|',
            'telp' => 'required|unique:users|',

        ]);

        $simpan = User::findOrfail($id);
        $simpan->update([
            'nama'     => $request->nama,
            'nik'     => $request->nik,
            'alamat'     => $request->alamat,
            'email'     => $request->email,
            'telp'     => $request->telp,
        ]);
        return redirect('/user/profile');
        // DB::table('users')
        // ->where('id', $id)
        // ->update([
        //     'nama'     => $request->nama,
        //     'alamat'     => $request->alamat,
        //     'email'     => $request->email,
        //     'telp'     => $request->telp,
        // ]);
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
