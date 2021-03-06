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

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function login()
    {
        return $this->belongsTo(Login::class);
    }

    public function laporan()
    {
        return $this->belongsToMany(Laporan::class);
    }
}
