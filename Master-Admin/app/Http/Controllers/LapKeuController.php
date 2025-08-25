<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_ziswaf;
use App\Models\lap_keu;
use App\Http\Requests\Storelap_keuRequest;
use App\Http\Requests\Updatelap_keuRequest;
use App\Models\masjid;

class LapKeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financereport',[
            "title" => "Masjid",
            "list_masjid"=> masjid::latest()->filter()->paginate(20)
        ]);
    }
    public function cetaklapkeu($id){
        $data = masjid::where('id', $id)->first();
        $lapkeu = lap_keu::where('masjid_id', $id)->filter()->orderBy('date','asc');
        return view('cetaklapkeu',[
            "data" => $data,
            "lapkeu"=> $lapkeu->get()
        ]);
    }
    public function lapkeu($id)
    {
        $data = masjid::where('id', $id)->first();
        $lapkeu = lap_keu::where('masjid_id', $id)->filter()->orderBy('date','asc');
        return view('FRMasjid',[
            "title" => "Masjid",
            "data" => $data,
            "lapkeu"=> $lapkeu->get()
        ]);
    }
    public function ziswaf($id)
    {
        //tunggal
        $data_t = data_ziswaf::where('masjid_id', $id)->first();
        //jamak
        $data_j = data_ziswaf::where('masjid_id', $id);
        return view('FRZiswafmasjid',[
            "title" => "Masjid",
            "data_j"=> $data_j->paginate(20),
            "data_t"=> $data_t
        ]);
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
     * @param  \App\Http\Requests\Storelap_keuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'masjid_id'=>'required',
            'cashflow' => 'required',
            'note' => 'required',
            'date' => 'required',
            'nominal' => 'required'
        ]);
        lap_keu::create($validatedData);
        return back()->with('success','Arus Kas terbaru Telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lap_keu  $lap_keu
     * @return \Illuminate\Http\Response
     */
    public function show(lap_keu $lap_keu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lap_keu  $lap_keu
     * @return \Illuminate\Http\Response
     */
    public function edit(lap_keu $lap_keu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatelap_keuRequest  $request
     * @param  \App\Models\lap_keu  $lap_keu
     * @return \Illuminate\Http\Response
     */
    public function update(Updatelap_keuRequest $request, lap_keu $lap_keu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lap_keu  $lap_keu
     * @return \Illuminate\Http\Response
     */
    public function destroy(lap_keu $lap_keu)
    {
        //
    }
}
