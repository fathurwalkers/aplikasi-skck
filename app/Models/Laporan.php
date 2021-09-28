<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detail;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $guarded = [];

    public function detail()
    {
        return $this->belongsTo(Detail::class);
    }
}
