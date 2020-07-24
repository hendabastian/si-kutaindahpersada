<?php

namespace App\Http\Controllers\Direktur;

use App\Http\Controllers\Controller;
use App\Pemesanan;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('modules.Direktur.Laporan.index', [
            'title' => 'Laporan'
        ]);
    }

    public function showLaporan(Request $request)
    {
        if ($request->input('jenis_laporan') == 'pemesanan') {
            $model = Pemesanan::whereBetween('created_at', [
                $request->input('tgl_dari'),
                $request->input('tgl_sampai')
            ])->get();
            
            $pdf = PDF::loadView('modules.Direktur.Laporan._laporan_pemesanan', [
                'model' => $model,
                'total' => 0,
                'no' => 1
            ])->setPaper('a4', 'landscape');

            return $pdf->download('laporan_pemesanan.pdf');

        } elseif ($request->input('jenis_laporan') == 'pembayaran') {
            $model = Pemesanan::where('status', 11)->whereBetween('created_at', [
                $request->input('tgl_dari'),
                $request->input('tgl_sampai')
            ])->get();
            
            $pdf = PDF::loadView('modules.Direktur.Laporan._laporan_pembayaran', [
                'model' => $model,
                'total' => 0,
                'no' => 1
            ])->setPaper('a4', 'landscape');

            return $pdf->download('laporan_pembayaran.pdf');
        } elseif ($request->input('jenis_laporan') == 'jadwal_pembangunan') {
            $model = Pemesanan::where('status', '>', 9)->whereBetween('created_at', [
                $request->input('tgl_dari'),
                $request->input('tgl_sampai')
            ])->get();
        }
    }
}
