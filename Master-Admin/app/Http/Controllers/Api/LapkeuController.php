<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LapkeuController extends Controller
{
    public function lapkeu($id){
        $lapkeu = \App\Models\lap_keu::where('masjid_id', $id)->filter()->orderBy('date','desc')->get();
        return response()->json($lapkeu);
        // Lapkeu Arus Kas Beneran jangan terpisah (yang sudah di olah)
    }

    
}
