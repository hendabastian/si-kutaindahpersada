<?php

namespace App\Http\Controllers\Direktur;

use App\Http\Controllers\Controller;
use App\Pemesanan;
use App\PemesananVerifikasi;
use App\RAB;
use App\RABVerifikasi;
use Illuminate\Http\Request;

class RABController extends Controller
{
    public function index()
    {
        $model = Pemesanan::where('status', 5)->get();
        return view('modules.Direktur.RAB.index', [
            'model' => $model,
            'title' => 'Approval RAB'
        ]);
    }

    public function detail($id)
    {
        $model = Pemesanan::findOrFail($id);
        return view('modules.Direktur.RAB.detail', [
            'model' => $model,
            'title' => 'RAB: ' . $model->no_pemesanan
        ]);
    }

    public function approve($id, Request $request)
    {
        $model = Pemesanan::findOrFail($id);
        $model->status = 6;
        $model->save();

        $modelPemesananVerifikasi = new PemesananVerifikasi();
        $modelPemesananVerifikasi->pemesanan_id = $model->id;
        $modelPemesananVerifikasi->status = 6;
        $modelPemesananVerifikasi->keterangan = $request->input('keterangan');
        $modelPemesananVerifikasi->save();

        $modelRab = RAB::where('pemesanan_id', $model->id)->firstOrFail();
        $modelRab->status = 3;
        $modelRab->save();

        $modelRabVerifikasi = new RABVerifikasi();
        $modelRabVerifikasi->rab_id = $modelRab->id;
        $modelRabVerifikasi->status = 3;
        $modelRabVerifikasi->keterangan = $request->input('keterangan');
        $modelRabVerifikasi->save();

        $request->session()->flash('message', [
            'class' => 'success',
            'body' => 'Data RAB berhasil diapprove'
        ]);

        return back();
    }
}
