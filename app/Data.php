<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';
    protected $fillable = ['NRP','nama','No_Telp','Email','Dosbing','NIP','Awal_Reservasi','Akhir_Reservasi'];
}
