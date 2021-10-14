<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanDetail extends Model
{
    use HasFactory;
    protected $table = 'detail_laporan';

    protected $guarded = [];
    protected $primaryKey = 'id';
}
