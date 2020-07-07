<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\JadwalPembuatanRumah;
use App\PemeriksaanLokasi;
use App\Pemesanan;
use App\PemesananVerifikasi;
use App\SuratPerintahKerja;
use Illuminate\Database\Query\Expression;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public function index()
    {
        if (Auth::user()->user_role_id == 5) {
            $model = Pemesanan::where('user_id', Auth::user()->id)->get();
        } else {
            $model = Pemesanan::all();
        }
        return view('modules.Admin.Pemesanan.index', [
            'model' => $model,
            'title' => 'Data Pemesanan'
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $model = new Pemesanan();
            $model->user_id = Auth::user()->id;
            $model->no_pemesanan = $request->input('no_pemesanan');
            $model->deskripsi = $request->input('deskripsi');
            $model->alamat = $request->input('alamat');
            $model->status = 1;
            $model->save();
            $request->session()->flash('message', [
                'class' => 'success',
                'body' => 'Data pemesanan berhasil dibuat'
            ]);
            return redirect(route('pemesanan.detail', ['id' => $model->id]));
        } else {
            $uid = date('d') . substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2) . date('m') . substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2);
            return view('modules.Admin.Pemesanan.create', [
                'uid' => $uid,
                'title' => 'Buat Pemesanan'
            ]);
        }
    }

    public function detail($id)
    {
        $model = Pemesanan::findOrFail($id);
        return view('modules.Admin.Pemesanan.detail', [
            'model' => $model,
            'title' => 'Pemesanan No: ' . $model->no_pemesanan
        ]);
    }

    public function edit($id, Request $request)
    {
        $model = Pemesanan::findOrFail($id);
        if ($request->isMethod('put')) {
            $model->user_id = Auth::user()->id;
            $model->deskripsi = $request->input('deskripsi');
            $model->alamat = $request->input('alamat');
            $model->status = 1;
            $model->save();
            $request->session()->flash('message', [
                'class' => 'success',
                'body' => 'Data pemesanan berhasil dirubah'
            ]);
            return redirect(route('admin.pemesanan.detail', ['id' => $model->id]));
        } else {
            $uid = date('d') . substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2) . date('m') . substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2);
            return view('modules.Admin.Pemesanan.create', [
                'model' => $model,
                'uid' => $uid,
                'title' => 'Edit Pemesanan: ' . $model->no_pemesanan
            ]);
        }
    }

    public function proses($id, Request $request)
    {
        $model = Pemesanan::findOrFail($id);
        $model->status = $request->input('status');
        $model->save();

        if ($request->input('status') == 2) {
            $modelLokasi = new PemeriksaanLokasi();
            $modelLokasi->pemesanan_id = $model->id;
            $modelLokasi->status = 1;
            $modelLokasi->save();
        }

        $modelVerifikasi = new PemesananVerifikasi();
        $modelVerifikasi->pemesanan_id = $model->id;
        $modelVerifikasi->status = $request->input('status');
        $modelVerifikasi->keterangan = $request->input('keterangan');
        $modelVerifikasi->save();

        $request->session()->flash('message', [
            'class' => 'success',
            'body' => 'Data Pemesanan berhasil diproses'
        ]);
        return redirect(route('admin.pemesanan.detail', ['id' => $id]));
    }

    public function prosesRap($id, Request $request)
    {
        $model = Pemesanan::findOrFail($id);
        $model->status = $request->input('status');
        $model->save();

        if ($request->input('status') == 2) {
            $modelLokasi = new PemeriksaanLokasi();
            $modelLokasi->pemesanan_id = $model->id;
            $modelLokasi->status = 1;
            $modelLokasi->save();
        }

        $modelVerifikasi = new PemesananVerifikasi();
        $modelVerifikasi->pemesanan_id = $model->id;
        $modelVerifikasi->status = $request->input('status');
        $modelVerifikasi->keterangan = $request->input('keterangan');
        $modelVerifikasi->save();

        $request->session()->flash('message', [
            'class' => 'success',
            'body' => 'Data Pemesanan berhasil diproses'
        ]);
        return redirect(route('admin.pemesanan.detail', ['id' => $id]));
    }

    public function prosesSpk($id, Request $request)
    {
        $model = Pemesanan::findOrFail($id);
        $model->status = 9;
        $model->save();

        $modelSpk = new SuratPerintahKerja();
        $modelSpk->pemesanan_id = $model->id;
        $modelSpk->tgl_cetak = date('Y-m-d');
        $modelSpk->status = 1;
        $modelSpk->save();


        $modelVerifikasi = new PemesananVerifikasi();
        $modelVerifikasi->pemesanan_id = $model->id;
        $modelVerifikasi->status = 9;
        $modelVerifikasi->keterangan = $request->input('keterangan');
        $modelVerifikasi->save();

        $request->session()->flash('message', [
            'class' => 'success',
            'body' => 'Data Pemesanan berhasil diproses'
        ]);
        return redirect(route('admin.pemesanan.detail', ['id' => $id]));
    }
}
