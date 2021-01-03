<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'ms_anggota';
    protected $fillable = ['nama', 'username', 'email', 'password'];
    public $timestamps = false;
}
