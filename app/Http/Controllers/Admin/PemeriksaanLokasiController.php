<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PemeriksaanLokasi;
use Illuminate\Http\Request;

class PemeriksaanLokasiController extends Controller
{
    public function index()
    {
        $model = PemeriksaanLokasi::all();
        return view('modules.Admin.PemeriksaanLokasi.index', [
            'model' => $model,
            'title' => 'Pemeriksaan Lokasi'
        ]);
    }

    public function detail($id, Request $request)
    {
        $model = PemeriksaanLokasi::findOrFail($id);
        return view('modules.Admin.PemeriksaanLokasi.detail', [
            'model' => $model,
            'title' => 'Pemeriksaan Lokasi: ' . $model->getPemesanan->no_pemesanan
        ]);
    }

    public function create(Request $request)
    {
    }

    public function edit($id, Request $request)
    {
    }


    public function delete($id, Request $request)
    {
        PemeriksaanLokasi::findOrFail($id)->delete();
        $request->session()->flash('message', [
            'class' => 'success',
            'body' => 'Data telah berhasil dihapus'
        ]);
    }
}
