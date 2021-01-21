<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $table = 'events';
    protected $fillable = ['nama', 'tanggal_mulai', 'tanggal_akhir', 'keterangan'];
}
