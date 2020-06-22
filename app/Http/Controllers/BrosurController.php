<?php

namespace App\Http\Controllers;

use App\Brosur;
use Illuminate\Http\Request;

class BrosurController extends Controller
{
    public function index()
    {
        $model = Brosur::all();
        return view('modules.Brosur.index', [
            'model' => $model,
            'title' => 'Info Pembangunan Rumah'
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $model = new Brosur();
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
        return view('modules.Brosur.create', [
            'title' => 'Tambah Brosur'
        ]);
    }

    public function edit($id, Request $request)
    {
        $model = Brosur::findOrFail($id);
        if ($request->isMethod('put')) {
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
        return view('modules.Brosur.edit', [
            'model' => $model,
            'title' => 'Edit Brosur: ' . $model->id
        ]);
    }

    public function delete($id, Request $request)
    {
        $model = Brosur::findOrFail($id)->delete();
        $request->session()->flash('message', [
            'body' => 'Data Berhasil dihapus',
            'class' => 'danger'
        ]);
        return redirect(route('info-pembangunan-rumah.index'));
    }
}
