<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function masjid(){
        return $this->belongsTo(masjid::class);
    }
}
