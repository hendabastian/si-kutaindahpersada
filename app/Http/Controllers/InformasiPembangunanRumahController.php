<?php

namespace App\Http\Controllers;

use App\InfoPembangunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InformasiPembangunanRumahController extends Controller
{
    public function index(Request $request)
    {
        $model = InfoPembangunan::all();
        return view('modules.InformasiPembangunanRumah.index', [
            'model' => $model,
            'title' => 'Info Pembangunan Rumah'
        ]);
    }

    public function create()
    {
        return view('modules.InformasiPembangunanRumah.create', [
            'title' => 'Tambah Info Pembangunan Rumah'
        ]);
    }

    public function save(Request $request)
    {
        $model = new InfoPembangunan();
        $model->deskripsi = $request->input('deskripsi');
        if ($request->hasFile('file')) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '_info_.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('uploads/'), $fileName);
            $model->file = $fileName;
            $model->save();
            $request->session()->flash('message', [
                'body' => 'Data berhasil disimpan',
                'class' => 'success'
            ]);
            return redirect(route('info-pembangunan-rumah.index'));
        } else {
            $request->session()->flash('message', [
                'body' => 'Data gagal disimpan',
                'class' => 'danger'
            ]);
            return redirect(route('info-pembangunan-rumah.index'));
        }
    }
}
