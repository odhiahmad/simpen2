<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    protected $table = 't_pengadaan';

    public function getperusahaan() {
        return $this->hasOne('App\Perusahaan',"id","id_perusahaan");
    }
    public function getMp1() {
        return $this->hasOne('App\ModelsResource\DMetodePengadaan',"id","id_mp1");
    }
    public function getmp2() {
        return $this->hasOne('App\ModelsResource\DMetodePengadaan',"id","id_mp2");
    }
    public function getMp3() {
        return $this->hasOne('App\ModelsResource\DMetodePengadaan',"id","id_mp3");
    }
    public function getMp4() {
        return $this->hasOne('App\ModelsResource\DMetodePengadaan',"id","id_mp4");
    }
    public function getMp5() {
        return $this->hasOne('App\ModelsResource\DMetodePengadaan',"id","id_mp5");
    }


}

