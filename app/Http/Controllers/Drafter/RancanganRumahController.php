<?php

namespace App\Http\Controllers\Drafter;

use App\Http\Controllers\Controller;
use App\Pemesanan;
use App\PemesananVerifikasi;
use App\RancanganRumah;
use App\RancanganRumahAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RancanganRumahController extends Controller
{
    public function index()
    {
        $model = Pemesanan::where('status', 3)->get();
        return view('modules.Drafter.RancanganRumah.index', [
            'model' => $model,
            'title' => 'Rancangan Rumah'
        ]);
    }

    public function detail($id)
    {
        $model = Pemesanan::findOrFail($id);
        return view('modules.Drafter.RancanganRumah.detail', [
            'model' => $model,
            'title' => 'Rancangan Rumah: ' . $model->no_pemesanan
        ]);
    }

    public function uploadRancangan($id, Request $request)
    {
        $model = Pemesanan::findOrFail($id);
        $model->status = 4;
        $model->save();

        $modelPemesananVerifikasi = new PemesananVerifikasi();
        $modelPemesananVerifikasi->pemesanan_id = $model->id;
        $modelPemesananVerifikasi->status = 4;
        $modelPemesananVerifikasi->keterangan = $request->input('keterangan');
        $modelPemesananVerifikasi->save();

        $modelRancangan = new RancanganRumah();
        $modelRancangan->pemesanan_id = $model->id;
        $modelRancangan->deskripsi = $request->input('keterangan');
        $modelRancangan->status = 1;
        $modelRancangan->save();

        foreach ($request->file('file') as $index => $file) {
            $uid[$index] = uniqid(time(), true);
            $filename[$index] = $uid[$index] . '_rancangan.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/'), $filename[$index]);

            $modelAttachment[$index] = new RancanganRumahAttachment();
            $modelAttachment[$index]->rancangan_rumah_id = $modelRancangan->id;
            $modelAttachment[$index]->file = $filename[$index];
            $modelAttachment[$index]->deskripsi = $request->input('keterangan');
            $modelAttachment[$index]->save();
        }
        
        Mail::to($model->getUser->email)->send(new \App\Mail\KonsumenPemesananBaru());

        $request->session()->flash('message', [
            'class' => 'success',
            'body' => 'Rancangan telah berhasil diupload'
        ]);

        return redirect(route('drafter.rancangan-rumah.detail', ['id' => $model->id]));
    }
}
