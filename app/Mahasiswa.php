<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nama','nim','id_dosen'];
    public $timestamp= true;
    public function dosen(){
        return $this->belongsTo('App\Dosen','id_dosen');
    }
    public function wali(){
        return $this->hasOne('App\Wali','id_mahasiswa');
    }
    public function hobi(){
        return $this->belongsToMany('App\Hobi','mahasiswa_hobi','id_mahasiswa','id_hobi');
    }
}
