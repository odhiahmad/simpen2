<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InisiasiPengadaanSipilPekerjaan extends Model
{
    protected $table = 't_pengadaan_sipil_pekerjaan';

    protected $fillable = [
        'id_ips',
        'nama_pekerjaan',
    ];

    public function getips() {
        return $this->hasOne('App\InisiasiPengadaanSipil',"id","id_ips");
    }

    public function getipspekerjaangg() {
        return $this->hasMany('App\InisiasiPengadaanSipilSubPekerjaan',"id_ips_pekerjaan","id");
    }

}
