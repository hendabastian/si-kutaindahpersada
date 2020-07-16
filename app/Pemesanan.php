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

    public function getRAB()
    {
        return $this->hasOne(RAB::class, 'pemesanan_id', 'id');
    }

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getJadwal()
    {
        return $this->hasOne(JadwalPembuatanRumah::class, 'pemesanan_id', 'id');
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

    public function getStatusLabelTextAttribute()
    {
        switch ($this->status) {
            case 1:
                return 'Menunggu Validasi Admin';
                break;
            case 2:
                return 'Menunggu Pemeriksaan Lokasi';
                break;
            case 3:
                return 'Menunggu Rancangan Drafter';
                break;
            case 4:
                return 'Menunggu Rancangan Anggaran Biaya';
                break;
            case 5:
                return 'Menunggu Verifikasi Direktur';
                break;
            case 6:
                return 'Menunggu Rancangan Anggaran Pembelian';
                break;
            case 7:
                return 'Menunggu Penentuan Tanggal Dari Konsumen';
                break;
            case 8:
                return 'Menunggu Surat Perintah Kerja';
                break;
            case 9:
                return 'Membuat Jadwal Pembuatan Rumah';
                break;
            case 10:
                return 'Menunggu Cetak Kwitansi';
                break;
            case 11:
                return 'Pemesanan Selesai';
                break;
            case 0:
                return 'Ditolak';
                break;
        }
    }
}
