<?php

namespace App\Http\Controllers;
use App\Models\ReservationsM;
use App\Models\TransaksiM;
use App\Models\TablesM;
use App\Models\LogM;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf; 


use Illuminate\Http\Request;

class TransaksiC extends Controller
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
            'activity' => "User Di Halaman Transaksi"
        ]);
        $subtitle = "Daftar Transaksi";
        $vcari = request('search');
        $transaksiM = TransaksiM::select('reservations.*','transaksi.*', 'reservations.id AS id_reserv')
        ->join('reservations', 'reservations.id', '=', 'transaksi.reservations_id')
        ->where('nama_pelanggan', 'like', "%$vcari%")
        ->orWhere('transaksi.created_at', 'like', "%$vcari%")
        ->paginate(10);
        return view('transaksi', compact('subtitle', 'transaksiM','vcari'));

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
            'activity' => "User Di Halaman Tambah Transaksi"
        ]);
        $subtitle = "Tambah Reservation";
        $reservationsM = ReservationsM::all();
        $tablesM = TablesM::all();
        return view('transaksi_create', compact('subtitle', 'reservationsM','tablesM'));
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
            'activity' => "User Menambahkan Transaksi"
        ]);
        $reservations = ReservationsM::where("id", $request->input ('reservations_id'))->first();

       
        $request->validate([
            'reservations_id' => 'required',
            'uang_bayar' => 'required',
        ]);

        
        $transaksi = new TransaksiM;
        $transaksi->reservations_id = $request->input('reservations_id');
        $transaksi->uang_bayar = $request->input('uang_bayar');
        $transaksi->uang_kembali = $request->input('uang_bayar') - $reservations->harga_bayar;
      
        $transaksi->save();

         // Update the reservation status to "Selesai"
        $reservations->status = 'Selesai';
        $reservations->save();


        return redirect()->route('transaksi.index')->with('success', 'transaksi Berhasil Ditambahkan');
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
            'activity' => "User Di Halaman Edit Transaksi"
        ]);
        $subtitle = "Edit Transaksi";
        $transaksi = TransaksiM::find($id);
        $reservationsM = ReservationsM::all();
        $tablesM = TablesM::all();

        return view('transaksi_edit',
        compact('subtitle', 'tablesM' ,'reservationsM','transaksi'));
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
            'activity' => "User Mengedit Transaksi"
        ]);
        $reservations = ReservationsM::where("id", $request->input ('reservations_id'))->first();
        $request->validate([
            'reservations_id' => 'required',
            'uang_bayar' => 'required',
        ]);

        
        $transaksi = TransaksiM::find($id);
        $transaksi->reservations_id = $request->input('reservations_id');
        $transaksi->uang_bayar = $request->input('uang_bayar');
        $transaksi->uang_kembali = $request->input('uang_bayar') - $reservations->harga_bayar;
        $transaksi->save();
        return redirect()->route('transaksi.index')->with('success', 'transaksi Berhasil Di Edit');
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
            'activity' => "User Menghapus Transaksi"
        ]);
        TransaksiM::where('id', $id)->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }

    public function pdf()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()-> id,
            'activity' => "User Mengunduh PDF Transaksi"
        ]);
        $transaksiM = TransaksiM::select('reservations.*','transaksi.*', 'reservations.id AS id_reserv')
        ->join('reservations', 'reservations.id', '=', 'transaksi.reservations_id')->get();
        $pdf = PDF::loadview('transaksi_pdf',['transaksiM' => $transaksiM]);
        return $pdf->stream('transaksi.pdf');
    }

    public function cetak($id){ 
        $LogM = LogM::create([ 
            'id_user' => Auth::user()->id, 
            'activity' => 'User Mencetak Struk Transaksi' 
        ]); 
        
        $transaksiM = TransaksiM::select('reservations.*','transaksi.*', 'reservations.id AS id_reserv')
        ->join('reservations', 'reservations.id', '=', 'transaksi.reservations_id')->where('transaksi.id', $id)->get();
        $pdf = PDF::loadview('transaksi_cetak',['transaksiM' => $transaksiM]);
        return $pdf->stream('transaksi.cetak');

       
    }
}
