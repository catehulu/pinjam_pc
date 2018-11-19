<?php

namespace Pinjam;

use Illuminate\Database\Eloquent\Model;

class Komputer extends Model
{
    protected $table='komputer';
    protected $fillable = ['id_peminjam'];
}
