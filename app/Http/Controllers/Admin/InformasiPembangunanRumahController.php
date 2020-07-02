<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\InfoPembangunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InformasiPembangunanRumahController extends Controller
{
    public function index()
    {
        $model = InfoPembangunan::all();
        return view('modules.Admin.InformasiPembangunanRumah.index', [
            'model' => $model,
            'title' => 'Info Pembangunan Rumah'
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $model = new InfoPembangunan();
            $model->judul = $request->input('judul');
            $model->deskripsi = $request->input('deskripsi');
            if ($request->hasFile('file')) {
                $uid = uniqid(time(), true);
                $fileName = $uid . '_info_.' . $request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('uploads/'), $fileName);
            }
            $model->file = $fileName;
            $model->save();
            $request->session()->flash('message', [
                'body' => 'Data berhasil disimpan',
                'class' => 'success'
            ]);
            return redirect(route('admin.info-pembangunan-rumah.detail', ['id' => $model->id]));
        }
        return view('modules.Admin.InformasiPembangunanRumah.create', [
            'title' => 'Tambah Info Pembangunan Rumah'
        ]);
    }

    public function detail($id) 
    {
        $model = InfoPembangunan::findOrFail($id);
        return view('modules.Admin.InformasiPembangunanRumah.detail', [
            'model' => $model,
            'title' => $model->id
        ]);
    }

    public function edit($id, Request $request)
    {
        $model = InfoPembangunan::findOrFail($id);
        if ($request->isMethod('put')) {
            $model->judul = $request->input('judul');
            $model->deskripsi = $request->input('deskripsi');
            if ($request->hasFile('file')) {
                $uid = uniqid(time(), true);
                $fileName = $uid . '_info_.' . $request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('uploads/'), $fileName);
            } 
            $model->file = $fileName;
            $model->save();
            $request->session()->flash('message', [
                'body' => 'Data berhasil disimpan',
                'class' => 'success'
            ]);
            return redirect(route('admin.info-pembangunan-rumah.detail', ['id' => $model->id]));
        }
        return view('modules.Admin.InformasiPembangunanRumah.edit', [
            'model' => $model,
            'title' => 'Edit Info Pembangunan Rumah: ' . $model->id
        ]);
    }

    public function delete($id, Request $request)
    {
        $model = InfoPembangunan::findOrFail($id)->delete();
        $request->session()->flash('message', [
            'body' => 'Data Berhasil dihapus',
            'class' => 'success'
        ]);
        return redirect(route('admin.info-pembangunan-rumah.index'));
    }
}
