<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_ziswaf extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function data_ziswaf(){
        return $this->hasMany(data_ziswaf::class, 'jenis_ziswaf_id');
    }
}
