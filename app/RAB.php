<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model untuk (Rencana Anggaran Biaya) "t_rab". 
 */
class RAB extends Model
{
    public $table = 't_rab';
    use SoftDeletes;

    public function getPemesanan()
    {
        return $this->hasOne(Pemesanan::class, 'id', 'pemesanan_id');
    }

    public function getDetail()
    {
        return $this->hasMany(RABDetail::class, 'rab_id', 'id');
    }

    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case 1:
                return '<span class="label label-warning">Belum diajukan pada Direktur</span>';
                break;
            case 2:
                return '<span class="label label-warning">Diajukan pada Direktur</span>';
                break;
            case 3:
                return '<span class="label label-success">Disetujui Oleh Direktur</span>';
                break;
            case 0:
                return '<span class="label label-warning">Ditolak Direktur</span>';
                break;
        }
    }
}
