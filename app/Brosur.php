<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brosur extends Model
{
    public $table = 'm_brosur';
    use SoftDeletes;

    public function detailBrosur()
    {
        return $this->hasMany(DetailBrosur::class, 'brosur_id', 'id');
    }
}
