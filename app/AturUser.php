<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class AturUser extends Model
{
    protected $table = 't_userakses';


    public function getuseraturuser() {
        return $this->hasOne('App\User',"id","id_user");
    }

}
