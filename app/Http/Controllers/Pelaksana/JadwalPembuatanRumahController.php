<?php

namespace App\Http\Controllers\Pelaksana;

use App\Http\Controllers\Controller;
use App\JadwalPembuatanRumah;
use App\Pemesanan;
use App\PemesananVerifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JadwalPembuatanRumahController extends Controller
{
    public function index()
    {
        $model = Pemesanan::where('status', 9)->get();
        return view('modules.Pelaksana.JadwalPembuatanRumah.index', [
            'model' => $model,
            'title' => 'Jadwal Pembuatan Rumah'
        ]);
    }

    public function detail($id)
    {
        $model = Pemesanan::findOrFail($id);
        return view('modules.Pelaksana.JadwalPembuatanRumah.detail', [
            'model' => $model,
            'title' => 'Jadwal Pembuatan Rumah'
        ]);
    }

    public function setJadwal($id, Request $request)
    {
        $model = Pemesanan::findOrFail($id);
        $model->status = 10;
        $model->save();


        $modelTanggal = JadwalPembuatanRumah::where('pemesanan_id', $id)->firstOrFail();
        $modelTanggal->pemesanan_id = $model->id;
        $modelTanggal->tgl_selesai = date('Y-m-d', strtotime($request->input('tanggal')));
        $modelTanggal->status = 2;
        $modelTanggal->save();


        $modelVerifikasi = new PemesananVerifikasi();
        $modelVerifikasi->pemesanan_id = $model->id;
        $modelVerifikasi->status = 10;
        $modelVerifikasi->keterangan = $request->input('keterangan');
        $modelVerifikasi->save();

        Mail::to($model->getUser->email)->send(new \App\Mail\KonsumenPemesananBaru());


        $request->session()->flash('message', [
            'class' => 'success',
            'body' => 'Data Pemesanan berhasil diproses'
        ]);
        return redirect(route('pelaksana.jadwal-pembuatan.detail', ['id' => $id]));
    }
}
