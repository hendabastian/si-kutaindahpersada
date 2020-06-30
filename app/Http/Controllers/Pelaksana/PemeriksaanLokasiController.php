<?php

namespace App\Http\Controllers\Pelaksana;

use App\Http\Controllers\Controller;
use App\PemeriksaanLokasi;
use App\Pemesanan;
use Illuminate\Http\Request;

class PemeriksaanLokasiController extends Controller
{
    public function index()
    {
        $model = PemeriksaanLokasi::where('status',  1)->get();
        return view('modules.Pelaksana.PemeriksaanLokasi.index', [
            'model' => $model,
            'title' => 'Pemeriksaan Lokasi'
        ]);
    }

    public function detail($id)
    {
        $model = PemeriksaanLokasi::findOrFail($id);
        return view('modules.Pelaksana.PemeriksaanLokasi.detail', [
            'model' => $model,
            'title' => 'Pemeriksaan Lokasi: ' . $model->getPemesanan->no_pemesanan
        ]);
    }

    public function prosesLokasi($id, Request $request)
    {
        $model = PemeriksaanLokasi::findOrFail($id);
        $model->nama_pemilik = $request->input('nama_pemilik');
        $model->alamat_lokasi = $request->input('alamat_lokasi');
        $model->luas_tanah = $request->input('luas_tanah');
        $model->luas_bangunan = $request->input('luas_bangunan');
        $model->status = 2;
        $model->save();
    }
}
