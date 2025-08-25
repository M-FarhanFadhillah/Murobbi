<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\activity;
use App\Http\Requests\StoreactivityRequest;
use App\Http\Requests\UpdateactivityRequest;
use App\Models\masjid;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('activity',[
            "title" => "Masjid",
            "list_masjid"=> masjid::latest()->filter()->paginate(20)
        ]);
    }
    public function listActivity($id)
    {
        $data = masjid::where('id', $id);
        $kegiatan = activity::where('masjid_id', $id);
        $data_kegiatan = activity::all();
        return view('masjidactivity',[
            "title" => "Masjid",
            "data"=> $data->first(),
            "kegiatan"=> $kegiatan->paginate(20),
            "data_kegiatan"=>$data_kegiatan
        ]);
    }
    public function delate($id)
    {
        // $masjid_name= activity::where('id', $id);
        activity::where('id', $id)->delete();
        return back()->with('delate','Data Kegiatan Telah dihapus!');
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
     * @param  \App\Http\Requests\StoreactivityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'masjid_id'=>'required',
            'activity_name' => 'required',
            'decription' => 'required',
            'categories' => 'required|max:255',
            'pict' => 'required'
        ]);
        $validatedData['pict'] = $request->file('pict')->store('gambar-kegiatan');
        activity::create($validatedData);
        return back()->with('success','Aktivitas Baru Telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateactivityRequest  $request
     * @param  \App\Models\activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateactivityRequest $request, activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(activity $activity)
    {
        //
    }
}
