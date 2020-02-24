<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = ['nama','nipd'];
    public $timestamp= true;
    public function mahasiswa(){
        return $this->hasMany('App\Mahasiswa','id_dosen');
    }
}
