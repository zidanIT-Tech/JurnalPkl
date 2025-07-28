<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Factories\HasFactory;

class Jurnal extends Model
{
   /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'kegiatan',
        'dokumentasi',
        'tanggal',
        'keterangan',
    ];
}
