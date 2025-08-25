<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function user($id){
        $user = \App\Models\User::where('id',$id)->get();
        return response()->json($user);
    }
}
