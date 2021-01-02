<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class SubPekerjaan extends Model
{
    protected $table = 'd_sub_pekerjaan';

    protected $fillable = [
        'id_pekerjaan',
        'nama',
    ];


}
