<?php

namespace Pinjam;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Data extends Model
{
    use SoftDeletes;
    protected $table = 'data';
    protected $fillable = ['NRP','nama','No_Telp','Email','Dosbing','NIP','Awal_Reservasi','Akhir_Reservasi','STAT','spesifikasi','kebutuhan','path'];
    protected $dates = ['deleted_at'];
}
