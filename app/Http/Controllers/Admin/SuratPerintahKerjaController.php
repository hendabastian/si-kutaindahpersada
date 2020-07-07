<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pemesanan;
use Illuminate\Http\Request;

class SuratPerintahKerjaController extends Controller
{
    public function index()
    {
        $model = Pemesanan::where('status',  8)->get();
        return view('modules.Admin.SuratPerintahKerja.index', [
            'model' => $model,
            'title' => 'Surat Perintah Kerja'
        ]);
    }
}
