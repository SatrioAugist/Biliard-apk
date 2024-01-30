<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogM;
use App\Models\TablesM;
use Illuminate\Support\Facades\Auth;

class tablesC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function tablescount()
     {
         
         $tablesCount = TablesM::count();   
         return view('dashboard',  compact('tablesCount'));
     }
     
    public function index()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()-> id,
            'activity' => "User Di Halaman Meja"
        ]);
        $subtitle = "Daftar Meja";
        $tablesM = TablesM::all();
        return view('table', compact('tablesM','subtitle'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()-> id,
            'activity' => "User Di Halaman Tambah Meja"
        ]);
        $subtitle = "Tambah Produk";
        return view('table_create', compact('subtitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()-> id,
            'activity' => "User Menambahkan Meja"
        ]);
        $request->validate([
            'merk' => 'required',
            'ukuran' => 'required',
            'harga' => 'required',
        ]);
        TablesM::create($request->post());
        return redirect()->route('tables.index')->with('success', 'Meja berhasil ditambahkan');
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
        $LogM = LogM::create([
            'id_user' => Auth::user()-> id,
            'activity' => "User Di Halaman Edit Meja"
        ]);
        $subtitle = "Edit Produk";
        $data = TablesM::find($id);
        return view('table_edit', compact('subtitle', 'data'));
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
        $LogM = LogM::create([
            'id_user' => Auth::user()-> id,
            'activity' => "User Mengedit Meja"
        ]);
        $request->validate([
            'merk' => 'required',
            'ukuran' => 'required',
            'harga' => 'required',
        ]);
   
        $data = request()->except(['_token', '_method', 'submit']);
   
        TablesM::where('id', $id)->update($data);
        return redirect()->route('tables.index')->with('success', 'Produk berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()-> id,
            'activity' => "User Menghapus Meja"
        ]);
        TablesM::where('id', $id)->delete();
        return redirect()->route('tables.index')->with('success', 'Produk berhasil dihapus');
    }
}
