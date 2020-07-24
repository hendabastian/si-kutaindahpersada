<?php

namespace App\Http\Controllers\Pelaksana;

use App\Http\Controllers\Controller;
use App\PemeriksaanLokasi;
use App\PemeriksaanLokasiAttachment;
use App\PemeriksaanLokasiVerifikasi;
use App\Pemesanan;
use App\PemesananVerifikasi;
use App\RancanganRumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        $modelPemesanan = Pemesanan::findOrFail($model->pemesanan_id);
        $modelPemesanan->status = 3;
        $modelPemesanan->save();

        $modelPemesananVerifikasi = new PemesananVerifikasi();
        $modelPemesananVerifikasi->pemesanan_id = $model->pemesanan_id;
        $modelPemesananVerifikasi->status = 3;
        $modelPemesananVerifikasi->keterangan = $request->input('keterangan');
        $modelPemesananVerifikasi->save();
        
        foreach ($request->file('file') as $index => $file) {
            $uid[$index] = uniqid(time(), true);
            $filename[$index] = $uid[$index] . '_file_.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/'), $filename[$index]);

            $modelAttachment[$index] = new PemeriksaanLokasiAttachment();
            $modelAttachment[$index]->pemeriksaan_lokasi_id = $model->id;
            $modelAttachment[$index]->file = $filename[$index];
            $modelAttachment[$index]->save();
        }

        $modelVerifikasi = new PemeriksaanLokasiVerifikasi();
        $modelVerifikasi->pemeriksaan_lokasi_id = $model->id;
        $modelVerifikasi->keterangan = $request->input('keterangan');
        $modelVerifikasi->status = 2;
        $modelVerifikasi->save();

        Mail::to($model->getUser->email)->send(new \App\Mail\KonsumenPemesananBaru());

        $request->session()->flash('message', [
            'class' => 'success',
            'body' => 'Data Lokasi berhasil disimpan'
        ]);
        return redirect(route('pelaksana.pemeriksaan-lokasi.detail', ['id' => $model->id]));
    }

    public function lokasiInvalid($id, Request $request)
    {
        $model = PemeriksaanLokasi::findOrFail($id);
        $model->status = 0;
        $model->save();
        
        $modelPemesanan = Pemesanan::findOrFail($model->pemesanan_id);
        $modelPemesanan->status = 0;
        $modelPemesanan->save();

        $modelPemesananVerifikasi = new PemesananVerifikasi();
        $modelPemesananVerifikasi->pemesanan_id = $model->pemesanan_id;
        $modelPemesananVerifikasi->status = 0;
        $modelPemesananVerifikasi->keterangan = $request->input('keterangan');
        $modelPemesananVerifikasi->save();

        $modelVerifikasi = new PemeriksaanLokasiVerifikasi();
        $modelVerifikasi->pemeriksaan_lokasi_id = $model->id;
        $modelVerifikasi->keterangan = 'Lokasi tidak valid';
        $modelVerifikasi->status = 0;
        $modelVerifikasi->save();
        Mail::to($model->getUser->email)->send(new \App\Mail\KonsumenPemesananBaru());

        $request->session()->flash('message', [
            'class' => 'success',
            'body' => 'Data lokasi berhasil dikembalikan ke konsumen untuk ditinjau kembali'
        ]);

        return redirect(route('pelaksana.pemeriksaan-lokasi.detail', ['id' => $model->id]));
    }
}
