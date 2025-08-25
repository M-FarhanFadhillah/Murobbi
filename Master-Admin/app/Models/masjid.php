<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masjid extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    public function lap_keu(){
        return $this->hasMany(lap_keu::class, 'masjid_id');
    }
    public function activity(){
        return $this->hasMany(activity::class, 'masjid_id');
    }
    public function data_ziswaf(){
        return $this->hasMany(data_ziswaf::class, 'masjid_id');
    }
    public function scopeFilter($query){
        if(request('search')){
            return $query->where('masjid_name','ilike', '%' . request('search') . '%');
        }
    }
    
}
