<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Login;
use App\Models\Laporan;

class Detail extends Model
{
    use HasFactory;

    protected $table = 'data_skck';

    protected $guarded = [];

    public function login()
    {
        return $this->hasOne(Login::class);
    }

    public function laporan()
    {
        return $this->hasOne(Laporan::class);
    }
}
