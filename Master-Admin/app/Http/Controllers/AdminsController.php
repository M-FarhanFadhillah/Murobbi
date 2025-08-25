<?php

namespace App\Http\Controllers;

use App\Models\admins;
use App\Http\Requests\StoreadminsRequest;
use App\Http\Requests\UpdateadminsRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login',[
            "title" => "Login",
        ]);
    }
    public function authenticate(Request $request)
    {
        // $credentials = $request->validate([
        //     'email' => ['required', 'email:dns'],
        //     'password' => ['required'],
        // ]);
        // if (Auth::attempt($credentials)) {
        //     dd('Login Berhasil!');
        //     // $request->session()->regenerate(); 
        //     // return redirect()->intended('/dashboard');
        // }
 
        // return back()->with('failed','Login Failed!');
        // $data = [
        //     'email'=> $request->input('email'),
        //     'password'=> $request->input('password'),
        // ];
        // if(Auth::attempt($data)){
        //     return redirect('/home');
        // }else{
        //     return back()->with('failed','Login Failed!');
        // }
        $data = [
            'email'=> $request->email,
            'password'=> $request->password,
        ];
        
        $user = User::where('email', $data['email'])->where('password', $data['password'])->first();
        // dd($user);
        // if(Auth::loginUsingId($user->id) && Auth::user()->is_admin == true) {
        //     return redirect('/home');
        // } else {
        //     return back()->with('failed', 'Login failed!');
        // }
        if($user) {
            if(Auth::loginUsingId($user->id) && Auth::user()->is_admin === true) {
                return redirect('/home');
            }
        } 
        else {
            return back()->with('failed', 'Login failed!');
        }
        // if(!$user) {
        //     return back()->with('failed', 'Login failed!');
        // } else {
        //     if(Auth::loginUsingId($user->id) && Auth::user()->is_admin === true) {
        //     // if(Auth::loginUsingId($user->id)) {
        //         // dd('Login Berhasil sih');
        //         return redirect('/home');
        //     }
        // }
    }
    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
    // public function actionlogin(Request $request)
    // {
    //     $data = [
    //         'email' => $request->input('email'),
    //         'password' => $request->input('password'),
    //     ];

    //     // $check = admins::where('email', $request->input('email'))->where('password', $request->input('password'))->get();
    //     // dd($check);
    //     if (Auth::attempt($data)) {
    //         // Auth::attempt($check);
    //         return redirect('/home');
    //     }else{
    //         return back()->with('failed','Login Failed!');
    //         // dd("Login Berhasil");
    //         // return redirect('/home');
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreadminsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreadminsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function show(admins $admins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function edit(admins $admins)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateadminsRequest  $request
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateadminsRequest $request, admins $admins)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function destroy(admins $admins)
    {
        //
    }
}
