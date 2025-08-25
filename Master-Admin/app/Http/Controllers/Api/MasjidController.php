<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasjidController extends Controller
{
    public function index(){
        $masjid = \App\Models\masjid::get();
        return response()->json($masjid);
    }
    public function masjid($id){
        $masjid = \App\Models\masjid::where('id',$id)->get();
        return response()->json($masjid);
    }
}
