<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanDetail extends Model
{
    use HasFactory;
    protected $table = 'laporan_detail';

    protected $guarded = [];
    protected $primaryKey = 'id';
}
