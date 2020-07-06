<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JadwalPembuatanRumah extends Model
{
    public $table = 't_jadwal_pembuatan_rumah';
    use SoftDeletes;

    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case 1:
                return '<span class="label label-warning">Tanggal Mulai Sudah Ditentukan Konsumen</span>';
                break;
            case 2:
                return '<span class="label label-primary">Menunggu Pemeriksaan Lokasi</span>';
                break;
            case 0:
                return '<span class="label label-danger">Ditolak</span>';
                break;
        }
    }
}
