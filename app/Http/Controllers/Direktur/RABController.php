<?php

namespace App\Http\Controllers\Direktur;

use App\Http\Controllers\Controller;
use App\Pemesanan;
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

    public function approve($id)
    {

    }
}
