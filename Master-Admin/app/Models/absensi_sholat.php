<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absensi_sholat extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function waktu_sholat(){
        return $this->belongsTo(waktu_sholat::class);
    }
    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

}
