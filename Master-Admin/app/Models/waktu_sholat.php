<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class waktu_sholat extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function absensi_sholat(){
        return $this->hasMany(absensi_sholat::class, 'waktu_sholat_id');
    }
}
