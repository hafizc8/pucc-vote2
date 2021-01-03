<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paslon extends Model
{
    protected $table = 'ms_paslon';
    protected $fillable = ['nama_paslon', 'visi_misi'];
    public $timestamps = false;
}
