<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class AturUser extends Model
{
    protected $table = 't_userakses';

    protected $fillable = [
        'id_pengadaan',
        'id_user'
    ];

}
