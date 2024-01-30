<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TablesM;
use App\Models\ReservationsM;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\LogM;
use Illuminate\Support\Facades\Auth;


class ReservationsC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()-> id,
            'activity' => "User Di Halaman Reservasi"
        ]);

        $subtitle = "Daftar Reservation";
        $vcari = request('search');
        $reservationsM = ReservationsM::select('reservations.*', 'tables.*', 'reservations.id','reservations.created_at AS jam')->join('tables', 'tables.id', '=', 'reservations.table_id')
        ->where('nama_pelanggan', 'like', "%$vcari%")
        ->orWhere('reservations.created_at', 'like', "%$vcari%")
        ->paginate(10);;
        return view('reservations', compact('subtitle', 'reservationsM','vcari'));

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
            'activity' => "User Di Halaman Tambah Reservasi"
        ]);
        $subtitle = "Tambah Reservation";
        $tablesM = TablesM::all();
        return view('reservations_create', compact('subtitle', 'tablesM'));
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
            'activity' => "User Menambahkan Reservasi"
        ]);
        $tables = TablesM::
        where("id", $request->input ('table_id'))->first();
        $request->validate([
            'nomor_unik' => 'required',
            'nama_pelanggan' => 'required',
            'table_id' => 'required',
            'jumlah_jam' => 'required',
            'jam_mulai' => 'required',
            'jam_akhir' => 'required',
        ]);


        $reservations = new ReservationsM;
        $reservations->nomor_unik = $request->input('nomor_unik');
        $reservations->nama_pelanggan = $request->input('nama_pelanggan');
        $reservations->table_id = $request->input('table_id');
        $reservations->jam_mulai = $request->input('jam_mulai');
        $reservations->jam_akhir = $request->input('jam_akhir');
        $reservations->jumlah_jam = $request->input('jumlah_jam');
        $reservations->harga_bayar = $request->input('jumlah_jam') * $tables->harga;
        $reservations->status = 'Pending';
        $reservations->save();
        return redirect()->route('reservations.index')->with('success', 'Reservasi Berhasil Ditambahkan');
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
            'activity' => "User Di Halaman Edit Reservasi"
        ]);
        $subtitle = "Edit Reservasi";
        $reservations = ReservationsM::find($id);
        $tablesM = TablesM::all();

        return view('reservations_edit',
        compact('subtitle', 'tablesM' ,'reservations'));
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
            'activity' => "User Mengedit Reservasi"
        ]);
        $tables = TablesM::where("id", $request->input ('table_id'))->first();
        $request->validate([
            'nomor_unik' => 'required',
            'nama_pelanggan' => 'required',
            'table_id' => 'required',
            'jumlah_jam' => 'required',
            'jam_mulai' => 'required',
            'jam_akhir' => 'required',
        ]);
    
    
        $reservations = ReservationsM::find($id);
        $reservations->nomor_unik = $request->input('nomor_unik');
        $reservations->nama_pelanggan = $request->input('nama_pelanggan');
        $reservations->table_id = $request->input('table_id');
        $reservations->jam_mulai = $request->input('jam_mulai');
        $reservations->jam_akhir = $request->input('jam_akhir');
        $reservations->jumlah_jam = $request->input('jumlah_jam');
        $reservations->harga_bayar = $request->input('jumlah_jam') * $tables->harga;
        $reservations->save();
    
        return redirect()->route('reservations.index')->with('success', 'Reservasi Berhasil Diupdate');
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
            'id_user' => Auth::user()->id,
            'activity' => "User Menghapus Reservasi"
        ]);

        $reserv=ReservationsM::find($id);
        $reserv->delete();
        return redirect()->back()->with('success', 'Reservasi berhasil dihapus');
    }

    public function pdf()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()-> id,
            'activity' => "User Mengunduh PDF Reservasi"
        ]);
        $reservationsM = ReservationsM::select('reservations.*', 'tables.*', 'reservations.id AS id_trans', 'reservations.table_id AS id_meja')
        ->join('tables', 'tables.id', '=', 'reservations.table_id')->get();
        $pdf = PDF::loadview('reservations_pdf',['reservationsM' => $reservationsM]);
        return $pdf->stream('reservations.pdf');
    }

    public function cetak($id){ 
        $LogM = LogM::create([ 
            'id_user' => Auth::user()->id, 
            'activity' => 'User Mencetak Struk Reservasi' 
        ]); 

        $reservationsM = ReservationsM::select('reservations.*', 'tables.*', 'reservations.id AS id_trans', 'reservations.table_id AS id_meja')
        ->join('tables', 'tables.id', '=', 'reservations.table_id')->where('reservations.id', $id)->get();
        $pdf = PDF::loadview('reservations_cetak',['reservationsM' => $reservationsM]);
        return $pdf->stream('reservations.cetak');
    }
}
