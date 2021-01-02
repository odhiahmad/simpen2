<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'd_pekerjaan';

    protected $fillable = [
        'nama',
        'vol_pekerjaan',
        'satuan',
    ];


}

