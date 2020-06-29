<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemesanan extends Model
{
    use SoftDeletes;
    public $table = 't_pemesanan';

    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case 1: 
                return '<span class="label label-warning">Menunggu Validasi Admin</span>';
            break;
            case 2: 
                return '<span class="label label-primary">Menunggu Pemeriksaan Lokasi</span>';
            break;
        }
    }
}
