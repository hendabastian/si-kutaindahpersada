<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemesanan extends Model
{
    use SoftDeletes;
    public $table = 't_pemesanan';

    public function getPemeriksaanLokasi()
    {
        return $this->hasOne(PemeriksaanLokasi::class, 'pemesanan_id', 'id');
    }

    public function getRancanganRumah()
    {
        return $this->hasOne(RancanganRumah::class, 'pemesanan_id', 'id');
    }

    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case 1: 
                return '<span class="label label-warning">Menunggu Validasi Admin</span>';
            break;
            case 2: 
                return '<span class="label label-primary">Menunggu Pemeriksaan Lokasi</span>';
            break;
            case 0 :
                return '<span class="label label-danger">Ditolak</span>';
            break;
        }
    }
}
