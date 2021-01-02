<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class InisiasiPengadaanSipil extends Model
{
    protected $table = 't_pengadaan_sipil';

    protected $fillable = [
        'judul',
        'sub_judul1',
        'sub_judul2',
        'sub_judul3',

    ];

}

