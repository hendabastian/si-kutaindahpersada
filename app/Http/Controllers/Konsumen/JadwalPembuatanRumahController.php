<?php

namespace App\Http\Controllers\Konsumen;

use App\Http\Controllers\Controller;
use App\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalPembuatanRumahController extends Controller
{
    public function index()
    {
        $model = Pemesanan::where('status', '>', 9)->where('user_id', Auth::user()->id)->get();
        return view('modules.Konsumen.JadwalPembuatanRumah.index', [
            'model' => $model,
            'title' => 'Jadwal Pembuatan Rumah'
        ]);
    }
}
