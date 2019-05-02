<?php

namespace Pinjam;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = ['nama','jumlah','keterangan'];
}
