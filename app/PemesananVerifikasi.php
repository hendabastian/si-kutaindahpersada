<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemesananVerifikasi extends Model
{
    public $table = 't_pemesanan_verifikasi';
    use SoftDeletes;

    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case 1:
                return '<span class="label label-warning">Menunggu Validasi Admin</span>';
                break;
            case 2:
                return '<span class="label label-primary">Menunggu Pemeriksaan Lokasi</span>';
                break;
            case 3:
                return '<span class="label label-primary">Menunggu Rancangan Drafter</span>';
                break;
            case 4:
                return '<span class="label label-primary">Menunggu Rancangan Anggaran Biaya</span>';
                break;
            case 5:
                return '<span class="label label-primary">Menunggu Verifikasi Direktur</span>';
                break;
            case 6:
                return '<span class="label label-primary">Menunggu Rancangan Anggaran Pembelian</span>';
                break;
            case 7:
                return '<span class="label label-primary">Menunggu Penentuan Tanggal Dari Konsumen</span>';
                break;
            case 8:
                return '<span class="label label-primary">Menunggu Surat Perintah Kerja</span>';
                break;
            case 9:
                return '<span class="label label-primary">Membuat Jadwal Pembuatan Rumah</span>';
                break;
            case 10:
                return '<span class="label label-primary">Menunggu Cetak Kwitansi</span>';
                break;
            case 11:
                return '<span class="label label-success">Pemesanan Selesai</span>';
                break;
            case 0:
                return '<span class="label label-danger">Ditolak</span>';
                break;
        }
    }
}
