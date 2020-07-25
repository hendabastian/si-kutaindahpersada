<?php

namespace App\Http\Controllers\Direktur;

use App\Http\Controllers\Controller;
use App\Pemesanan;
use App\PemesananVerifikasi;
use App\RAB;
use App\RABVerifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $model->status = $request->input('status');
        $model->save();

        $modelPemesananVerifikasi = new PemesananVerifikasi();
        $modelPemesananVerifikasi->pemesanan_id = $model->id;
        $modelPemesananVerifikasi->status = 6;
        $modelPemesananVerifikasi->keterangan = $request->input('keterangan');
        $modelPemesananVerifikasi->save();

        $modelRab = RAB::where('pemesanan_id', $model->id)->firstOrFail();
        if ($request->input('status') == 6) {
            $modelRab->status = 3;
        } elseif ($request->input('status') == 4) {
            $modelRab->status = 0;
        }
        $modelRab->save();

        $modelRabVerifikasi = new RABVerifikasi();
        $modelRabVerifikasi->rab_id = $modelRab->id;
        $modelRabVerifikasi->status = 3;
        $modelRabVerifikasi->keterangan = $request->input('keterangan');
        $modelRabVerifikasi->save();

        Mail::to($model->getUser->email)->send(new \App\Mail\KonsumenPemesananBaru());

        if ($request->input('status') == 6) {
            $request->session()->flash('message', [
                'class' => 'success',
                'body' => 'Data RAB berhasil diapprove'
            ]);
        } elseif ($request->input('status')==4) {
            $request->session()->flash('message', [
                'class' => 'danger',
                'body' => 'Data RAB berhasil ditolak'
            ]);
        }
        

        return back();
    }
}
