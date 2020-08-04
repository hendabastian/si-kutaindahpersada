<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kwitansi;
use App\Pemesanan;
use App\PemesananVerifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

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
        $modelKwitansi->deskripsi = $request->input('deskripsi');
        $modelKwitansi->status = 1;
        $modelKwitansi->save();


        $modelVerifikasi = new PemesananVerifikasi();
        $modelVerifikasi->pemesanan_id = $model->id;
        $modelVerifikasi->status = 11;
        $modelVerifikasi->keterangan = $request->input('deskripsi');
        $modelVerifikasi->save();

        Mail::to($model->getUser->email)->send(new \App\Mail\KonsumenPemesananBaru());

        $pdf = PDF::loadView('modules.Admin.Kwitansi._doc_kwitansi', [
            'model' => $model,
            'total' => 0,
            'no' => 1
        ])->setPaper('a4', 'landscape');

        $request->session()->flash('message', [
            'class' => 'success',
            'body' => 'Data Kwitansi berhasil dikirm'
        ]);
        if (is_dir(public_path() . '/printed') == false) {
            mkdir(public_path() . '/printed', 0777);
        }
        $path = public_path() . '/printed/kwitansi_' . $model->no_pemesanan . '.pdf';
        file_put_contents($path, $pdf->output());
        return redirect(route('admin.kwitansi.detail', ['id' => $id]));
    }
}
