<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemeriksaanLokasi extends Model
{
    public $table = 't_pemeriksaan_lokasi';
    use SoftDeletes;

    public function getPemesanan()
    {
        return $this->hasOne(Pemesanan::class, 'id', 'pemesanan_id');
    }

    public function getLokasiAttachment()
    {
        return $this->hasMany(PemeriksaanLokasiAttachment::class, 'pemeriksaan_lokasi_id', 'id');
    }

    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case 1:
                return '<span class="label label-warning"><i class="fa fa-spinner fa-spin"></i> Menunggu Pemeriksaan Pelaksana</span>';
                break;
            case 2:
                return '<span class="label label-primary">Telah Diperiksa Pelaksana</span>';
                break;
            case 0:
                return '<span class="label label-danger"><i class="fa fa-spinner fa-spin"></i> Hasil Pemeriksaan Lokasi Ditolak</span>';;
                break;
        }
    }
}
