<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 't_perusahaan';

    protected $fillable = [
        'nama',
        'pimpinan',
        'notaris',
        'alamat',
        'bank',
        'kantor_cabang',
        'rekening',
        'npwp',
        'sebutan_jabatan',
        'bentuk_perusahaan',
        'telpon',
        'faksimili',
        'foto',
    ];


}
