<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function book(){
        $edu = \App\Models\education::where('jenis_education_id', 1)->get();
        return response()->json($edu);
    }
    public function video(){
        $edu = \App\Models\education::where('jenis_education_id', 2)->get();
        return response()->json($edu);
    }
}
