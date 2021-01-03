<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'vote';
    protected $fillable = ['no_paslon', 'jumlah'];
    public $timestamps = false;

    public function paslon()
    {
        return $this->hasOne(Paslon::class, 'id', 'no_paslon');
    }
}
