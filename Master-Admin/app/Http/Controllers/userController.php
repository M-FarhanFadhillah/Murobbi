<?php

namespace App\Http\Controllers;

use App\Models\absensi_sholat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class userController extends Controller
{
    public function index(){
        return view('users',[
            "title" => "Pengguna",
            "user_aktif" => User::where('status',1)->where('is_admin', false)->count(),
            "pendaftar" => User::where('status',0)->where('is_admin', false)->count()
        ]);
    }
    public function updateStatus(Request $request, $id)
    {
        $data = User::where('id', $id)->update(['status' => 1]);
        return back()->with('update','Pendaftar Telah Diterima!');
    }
    public function RefuseUser(Request $request, $id)
    {
        $data = User::where('id', $id)->update(['status' => 2]);
        return back()->with('delete','Pendaftar Telah Ditolak!');
    }    
    public function listUser(){
        $data = User::all();
        $id_user = '';
        
        return view('userlist',compact('data'),[
            "title" => "Pengguna",
            "user" => User::latest()->filter()->where('is_admin', false)->where('status','like', 1)->paginate(20)->withQueryString(),
            "user_id"=> $id_user,
            "absen" => absensi_sholat::where('users_id', 'like', $id_user)->get()
        ]);
    }
    public function dashboard(){
        return view('home',[
            "title" => "Dashboard"
        ]);
    }
    public function validateUser(){
        return view('validateUsers',[
            "title"=>"Pengguna",
            "user" => User::latest()->filter()->where('is_admin', false)->where('status','like', 0)->paginate(10)->withQueryString()
        ]);
    }
    public function store(Request $request){
        // dd($request->all());
        $validatedData = $request->validate([
            'name'=>'required|max:255',
            'email' => 'required|unique:users',
            'no_hp' => 'required|unique:users',
            'profil_pict' => 'required',
            'password' => 'min:5|required|max:255',
            'status' => 'required'
        ]);
        $validatedData['profil_pict'] = $request->file('profil_pict')->store('profil-pict');
        // dd($validatedData);
        // Jangan Lupa bcrypt passwordnya!
        // $request->session()->flash('status', 'Task was successful!');
        // $request->session()->flash('success', 'Pengguna Baru Telah ditambahkan!');
        // $request = session('success');
        // dd("Registrasi Berhasi!");
        User::create($validatedData);
        return redirect('/listUser')->with('success','Pengguna Baru Telah ditambahkan!');
    }
    public function update(Request $request, $id)
    {
        $data = User::where('id', $id)->update(['password' => $request->password]);
        return redirect('/listUser')->with('update','Password Telah diperbarui!');
    }
    public function delate($id)
    {
        User::where('id', $id)->delete();
        return redirect('/listUser')->with('delate','Data Pengguna Telah dihapus!');
    }
}
