<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalPembuatanRumahController extends Controller
{
    public function index()
    {
        $model = Pemesanan::where('status', '>', 9)->get();
        return view('modules.Admin.JadwalPembuatanRumah.index', [
            'model' => $model,
            'title' => 'Jadwal Pembuatan Rumah'
        ]);
    }
}
