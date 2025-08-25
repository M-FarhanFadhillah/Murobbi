<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\banner;
use App\Http\Requests\StorebannerRequest;
use App\Http\Requests\UpdatebannerRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aktif_banner = banner::where('status', true);
        $non_aktif = banner::where('status', false);
        return view('banner',[
            "title" => "Masjid",
            "aktif"=> $aktif_banner->get(),
            "non"=> $non_aktif->get(),
            "data"=> banner::all()
        ]);
    }
    public function update(Request $request, $id)
    {
        if (banner::where('status',true)->count()>2) {
            return redirect('/banner')->with('update','Banner Aktif Maksimal 3, Silahkan Nonaktif salah satu terlebih dahulu!');
        }else {
            $data = banner::where('id', $id)->update(['status' => $request->status]);
            return redirect('/banner')->with('update','Status Telah diperbarui!');
        }
    }
    public function updateNonActive(Request $request, $id)
    {
        $data = banner::where('id', $id)->update(['status' => $request->status]);
        return redirect('/banner')->with('update','Status Telah diperbarui!');
    }
    public function delate($id)
    {
        banner::where('id', $id)->delete();
        return redirect('/banner')->with('delate','Data Banner Telah dihapus!');
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
     * @param  \App\Http\Requests\StorebannerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'judul'=>'required',
            'deskripsi' => 'required',
            'cover' => 'required',
            'kategori' => 'required'
        ]);
        // dd($validatedData);
        $validatedData['cover'] = $request->file('cover')->store('cover-banner');
        banner::create($validatedData);
        return redirect('/banner')->with('success','Banner Baru Telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebannerRequest  $request
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(banner $banner)
    {
        //
    }
}
