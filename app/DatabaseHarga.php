<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class DatabaseHarga extends Model
{
    protected $table = 't_harga';

    protected $fillable = [
        'namaBarang',
        'jenisBarang',
        'satuanBarang',
        'jumlahBarang',
        'hargaSatuan',
        'asalUsulBarang',
        'keterangan',
        'foto',
        'status'
    ];

}

