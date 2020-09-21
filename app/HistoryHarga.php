<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class HistoryHarga extends Model
{
    protected $table = 'history_ubah_t_harga';

    protected $fillable = [
        'id_database_harga',
        'id_user',
        'harga_dari',
        'harga_ke',
    ];


    public function getUserHistoryUbah() {
        return $this->hasOne('App\User',"id","id_user");
    }

}
