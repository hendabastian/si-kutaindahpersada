<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kwitansi;
use App\Pemesanan;
use App\PemesananVerifikasi;
use Illuminate\Http\Request;

class KwitansiController extends Controller
{
    public function index()
    {
        $model = Pemesanan::where('status', 10)->get();
        return view('modules.Admin.Kwitansi.index', [
            'model' => $model,
            'title' => 'Jadwal Pembuatan Rumah'
        ]);
    }

    public function detail($id)
    {
        $model = Pemesanan::findOrFail($id);
        return view('modules.Admin.Kwitansi.detail', [
            'model' => $model,
            'title' => 'Pemesanan No: ' . $model->no_pemesanan
        ]);
    }

    public function prosesKwitansi($id, Request $request)
    {
        $model = Pemesanan::findOrFail($id);
        $model->status = 11;
        $model->save();

        $modelKwitansi = new Kwitansi();
        $modelKwitansi->pemesanan_id = $model->id;
        $modelKwitansi->no_kwitansi = $model->no_pemesanan;
        $modelKwitansi->deskripsi = 'Dicetak pada: ' . date('Y-m-d h:i:s');
        $modelKwitansi->status = 1;
        $modelKwitansi->save();


        $modelVerifikasi = new PemesananVerifikasi();
        $modelVerifikasi->pemesanan_id = $model->id;
        $modelVerifikasi->status = 11;
        $modelVerifikasi->keterangan = 'Dicetak pada: ' . date('Y-m-d h:i:s');
        $modelVerifikasi->save();

        $request->session()->flash('message', [
            'class' => 'success',
            'body' => 'Data Kwitansi berhasil dikirm'
        ]);
        return redirect(route('admin.pemesanan.detail', ['id' => $id]));
    }
}
