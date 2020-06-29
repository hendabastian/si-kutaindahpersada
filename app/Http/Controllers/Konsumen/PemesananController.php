<?php

namespace App\Http\Controllers\Konsumen;

use App\Http\Controllers\Controller;
use App\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public function index()
    {
        $model = Pemesanan::where('user_id', Auth::user()->id)->get();
        return view('modules.Konsumen.Pemesanan.index', [
            'model' => $model,
            'title' => 'Data Pemesanan'
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            switch ($request->input('tipe_bangunan')) {
                case 'Rumah':
                    $kodeTipe = 'RM';
                    break;
                case 'Ruko':
                    $kodeTipe = 'RK';
                    break;
                case 'Apartemen':
                    $kodeTipe = 'AP';
                    break;
            }
            $countDataPesanan = Pemesanan::whereYear('created_at', date('Y'))->count();
            if ($countDataPesanan > 0) {
                $getNoUrut = sprintf('%04s', $countDataPesanan + 1);
            } else {
                $getNoUrut = sprintf('%04s', 1);
            }

            $noPemesanan = $getNoUrut . date('m') . date('y') . $kodeTipe;

            $model = new Pemesanan();
            $model->user_id = Auth::user()->id;
            $model->nama_pemesan = $request->input('nama_pemesan');
            $model->no_pemesanan = $noPemesanan;
            $model->deskripsi = $request->input('deskripsi');
            $model->alamat = $request->input('alamat');
            $model->alamat_proyek = $request->input('alamat_proyek');
            $model->tipe_bangunan = $request->input('tipe_bangunan');
            $model->luas_tanah = $request->input('luas_tanah');
            $model->luas_bangunan = $request->input('luas_bangunan');
            $model->no_ktp = $request->input('no_ktp');
            $model->status = 1;
            if ($request->hasFile('file_ktp')) {
                $uid = uniqid(time(), true);
                $fileName = $uid . '_ktp_.' . $request->file('file_ktp')->getClientOriginalExtension();
                $request->file('file_ktp')->move(public_path('uploads/'), $fileName);
                $model->file_ktp = $fileName;
            }
            $model->save();
            $request->session()->flash('message', [
                'class' => 'success',
                'body' => 'Data pemesanan berhasil dibuat'
            ]);
            return redirect(route('konsumen.pemesanan.detail', ['id' => $model->id]));
        } else {
            return view('modules.Konsumen.Pemesanan.create', [
                'title' => 'Buat Pemesanan'
            ]);
        }
    }

    public function detail($id)
    {
        $model = Pemesanan::findOrFail($id);
        return view('modules.Konsumen.Pemesanan.detail', [
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
            return redirect(route('pemesanan.detail', ['id' => $model->id]));
        } else {
            $uid = date('d') . substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2) . date('m') . substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2);
            return view('modules.Konsumen.Pemesanan.create', [
                'model' => $model,
                'uid' => $uid,
                'title' => 'Edit Pemesanan: ' . $model->no_pemesanan
            ]);
        }
    }
}
