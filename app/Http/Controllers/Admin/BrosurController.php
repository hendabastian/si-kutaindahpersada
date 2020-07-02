<?php

namespace App\Http\Controllers\Admin;

use App\Brosur;
use App\DetailBrosur;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrosurController extends Controller
{
    public function index()
    {
        $model = Brosur::all();
        return view('modules.Admin.Brosur.index', [
            'model' => $model,
            'title' => 'Brosur'
        ]);
    }

    public function detail($id)
    {
        $model = Brosur::findOrFail($id);
        return view('modules.Admin.Brosur.detail', [
            'model' => $model,
            'title' => 'Brosur: ' . $model->judul
        ]);
    }

    public function create(Request $request)
    {
        $model = new Brosur();
        if ($request->isMethod('post')) {
            $model->judul = $request->input('judul');
            $model->model = $request->input('model');
            $model->harga = $request->input('harga');
            $model->lama_pembangunan = $request->input('lama_pembangunan');
            $model->luas_tanah = $request->input('luas_tanah');
            $model->luas_bangunan = $request->input('luas_bangunan');
            $model->deskripsi = $request->input('deskripsi');
            $model->save();
            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $index => $data) {
                    $uid[$index] = uniqid(time(), true);
                    $fileName[$index] = $uid[$index] . '_brosur_.' . $data->getClientOriginalExtension();
                    $data->move(public_path('uploads/'), $fileName[$index]);

                    $modelDetail[$index] = new DetailBrosur();
                    $modelDetail[$index]->brosur_id = $model->id;
                    $modelDetail[$index]->file = $fileName[$index];
                    $modelDetail[$index]->save();
                }
            }
            $request->session()->flash('message', [
                'body' => 'Data berhasil disimpan',
                'class' => 'success'
            ]);
            return redirect(route('admin.brosur.detail', ['id' => $model->id]));
        }
        return view('modules.Admin.Brosur.create', [
            'model' => $model,
            'title' => 'Buat Brosur'
        ]);
    }

    public function edit($id, Request $request)
    {
        $model = Brosur::findOrFail($id);
        if ($request->isMethod('put')) {
            $model->judul = $request->input('judul');
            $model->model = $request->input('model');
            $model->harga = $request->input('harga');
            $model->lama_pembangunan = $request->input('lama_pembangunan');
            $model->luas_tanah = $request->input('luas_tanah');
            $model->luas_bangunan = $request->input('luas_bangunan');
            $model->deskripsi = $request->input('deskripsi');

            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $index => $data) {
                    $uid[$index] = uniqid(time(), true);
                    $fileName[$index] = $uid[$index] . '_info_.' . $data->getClientOriginalExtension();
                    $data->move(public_path('uploads/'), $fileName[$index]);

                    $modelDetail[$index] = new DetailBrosur();
                    $modelDetail[$index]->brosur_id = $model->id;
                    $modelDetail[$index]->file = $fileName[$index];
                    $modelDetail[$index]->save();
                }
            }
            $model->save();
            $request->session()->flash('message', [
                'body' => 'Data berhasil disimpan',
                'class' => 'success'
            ]);
            return redirect(route('admin.brosur.detail', ['id' => $model->id]));
        }
        return view('modules.Admin.Brosur.edit', [
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
        return redirect(route('brosur.index'));
    }
}
