<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\education;
use App\Http\Requests\StoreeducationRequest;
use App\Http\Requests\UpdateeducationRequest;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('education',[
            "title" => "Masjid",
            "buku" => education::where('jenis_education_id', 1)->get(),
            "video" => education::where('jenis_education_id', 2)->get(),
            "data"=> education::all()
        ]);
    }
    public function delate($id)
    {
        education::where('id', $id)->delete();
        return redirect('/edu')->with('delate','Data Edukasi Telah dihapus!');
    }

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
     * @param  \App\Http\Requests\StoreeducationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_education_id'=>'required',
            'judul' => 'required',
            'kategori' => 'required',
            'content' => 'required',
            'deskripsi' => 'required'
        ]);
        $validatedData['content']=$request->file('content')->store('konten-edukasi');
        education::create($validatedData);
        return redirect('/edu')->with('success','Konten Edukasi Baru Telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateeducationRequest  $request
     * @param  \App\Models\education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateeducationRequest $request, education $education)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(education $education)
    {
        //
    }
}
