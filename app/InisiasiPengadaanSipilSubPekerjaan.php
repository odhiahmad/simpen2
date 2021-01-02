<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class InisiasiPengadaanSipilSubPekerjaan extends Model
{
    protected $table = 't_pengadaan_sipil_sub_pekerjaan';

    protected $fillable = [
        'id_ips',
        'id_pekerjaan',
        'id_ips_pekerjaan',
        'nama',
        'vol',
        'harga_jual',
        'total_harga'
    ];

    public function getips() {
        return $this->hasOne('App\InisiasiPengadaanSipil',"id","id_ips");
    }
    public function getipspekerjaan() {
        return $this->hasOne('App\InisiasiPengadaanSipilPekerjaan',"id","id_ips_pekerjaan");
    }

    public function setPermohonanBmt() {
        return $this->belongsTo('App\InisiasiPengadaanSipilPekerjaan',"id_ips","id_ips");
    }

}
