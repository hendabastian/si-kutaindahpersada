<?php

namespace App\Http\Controllers\Pelaksana;

use App\Http\Controllers\Controller;
use App\Pemesanan;
use App\PemesananVerifikasi;
use App\RAB;
use App\RABDetail;
use App\RABVerifikasi;
use Illuminate\Http\Request;

class RABController extends Controller
{
    public function index()
    {
        $model = Pemesanan::where('status', 4)->get();
        return view('modules.Pelaksana.RAB.index', [
            'model' => $model,
            'title' => 'RAB'
        ]);
    }

    public function detail($id)
    {
        $model = Pemesanan::findOrFail($id);
        return view('modules.Pelaksana.RAB.detail', [
            'model' => $model,
            'title' => 'RAB: ' . $model->no_pemesanan,
            'total' => 0
        ]);
    }

    public function create($pemesanan_id, Request $request)
    {

        $getRAB = RAB::where('pemesanan_id', $pemesanan_id)->first();
        if (!empty($getRAB)) {
            $modelRAB = clone $getRAB;
        } else {
            $modelRAB = new RAB();
            $modelRAB->pemesanan_id = $pemesanan_id;
            $modelRAB->status = 1;
            $modelRAB->save();

            $modelRABVerifikasi = new RABVerifikasi();
            $modelRABVerifikasi->rab_id = $modelRAB->id;
            $modelRABVerifikasi->status = 1;
            $modelRABVerifikasi->save();
        }

        return view('modules.Pelaksana.RAB.create', [
            'title' => 'Buat RAB: ' . $modelRAB->getPemesanan->no_pemesanan,
            'getRAB' => $modelRAB,
            'no' => 1,
            'total' => 0
        ]);
    }

    public function saveBarang($rab_id, Request $request)
    {
        $model = new RABDetail();
        $model->rab_id = $rab_id;
        $model->uraian = $request->input('uraian');
        $model->satuan = $request->input('satuan');
        $model->volume = $request->input('volume');
        $model->harga_satuan = $request->input('harga_satuan');
        $model->deskripsi = $request->input('deskripsi');
        $model->save();

        $request->session()->flash('message', [
            'class' => 'success',
            'body' => 'Uraian pembelian berhasil ditambahkan'
        ]);
        return back();
    }

    public function editBarang($id, Request $request)
    {
        $model = RABDetail::findOrFail($id);
        $model->uraian = $request->input('uraian');
        $model->satuan = $request->input('satuan');
        $model->volume = $request->input('volume');
        $model->harga_satuan = $request->input('harga_satuan');
        $model->deskripsi = $request->input('deskripsi');
        $model->save();

        $request->session()->flash('message', [
            'class' => 'success',
            'body' => 'Uraian pembelian berhasil diedit'
        ]);
        return back();
    }

    public function deleteBarang($id, Request $request)
    {
        RABDetail::findOrFail($id)->delete();
        $request->session()->flash('message', [
            'class' => 'success',
            'body' => 'Uraian pembelian berhasil dihapus'
        ]);
        return back();
    }

    public function saveRAB($rab_id, Request $request)
    {
        $model = RAB::findOrFail($rab_id);
        $model->status = 2;
        $model->save();

        $modelVerifikasi = new RABVerifikasi();
        $modelVerifikasi->rab_id = $rab_id;
        $modelVerifikasi->status = 2;
        $modelVerifikasi->save();

        $modelPemesanan = Pemesanan::findOrFail($model->pemesanan_id);
        $modelPemesanan->status = 5;
        $modelPemesanan->save();

        $modelPemesananVerifikasi = new PemesananVerifikasi();
        $modelPemesananVerifikasi->pemesanan_id = $model->pemesanan_id;
        $modelPemesananVerifikasi->status = 5;
        $modelPemesananVerifikasi->keterangan = $request->input('keterangan');
        $modelPemesananVerifikasi->save();

        $request->session()->flash('message', [
            'class' => 'success',
            'body' => 'Data RAB berhasil diajukan'
        ]);

        return redirect(route('pelaksana.rab.detail', ['id' => $model->pemesanan_id]));
    }
}
