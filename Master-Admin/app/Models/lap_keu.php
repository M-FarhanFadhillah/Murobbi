<?php

namespace App\Models;

use App\Models\masjid;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lap_keu extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function masjid(){
        return $this->belongsTo(masjid::class, 'masjid_id');
    }
    public function scopeFilter($query){
        if (request()->has('filter_awal') && request()->has('filter_akhir')) {
            $filterAwal = request('filter_awal');
            $filterAkhir = request('filter_akhir');
    
            return $query->whereBetween('date', [$filterAwal, $filterAkhir]);
        }
    }
}
