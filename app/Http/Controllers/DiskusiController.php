<?php

namespace App\Http\Controllers;

use App\PemesananDiskusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiskusiController extends Controller
{
    public function postDiskusi($pemesanan_id, Request $request)
    {
        $model = new PemesananDiskusi();
        $model->pemesanan_id = $pemesanan_id;
        $model->user_id = Auth::user()->id;
        $model->content = $request->input('content');
        $model->save();

        $request->session()->flash('message',[
            'class' => 'success',
            'body' => 'DIskusi berhasil ditambahkan'
        ]);
        return back();
    }
}
