<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoteTransaction extends Model
{
    protected $table = 'vote_transaction';
    protected $fillable = ['username', 'vote', 'masukan', 'tgl_aksi'];
    public $timestamps = false;

    public function anggota()
    {
        return $this->hasOne(Anggota::class, 'email', 'username');
    }
}
