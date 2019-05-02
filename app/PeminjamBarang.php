<?php

namespace Pinjam;

use Illuminate\Database\Eloquent\Model;

class PeminjamBarang extends Model
{
    protected $table = 'peminjaman';
    protected $fillable = ['NRP','nama','nama_barang','STAT','jumlah','path'];
}
