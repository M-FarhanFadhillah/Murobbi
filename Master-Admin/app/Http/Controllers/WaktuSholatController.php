<?php

namespace App\Http\Controllers;

use App\Models\waktu_sholat;
use App\Http\Requests\Storewaktu_sholatRequest;
use App\Http\Requests\Updatewaktu_sholatRequest;

class WaktuSholatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\Storewaktu_sholatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storewaktu_sholatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\waktu_sholat  $waktu_sholat
     * @return \Illuminate\Http\Response
     */
    public function show(waktu_sholat $waktu_sholat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\waktu_sholat  $waktu_sholat
     * @return \Illuminate\Http\Response
     */
    public function edit(waktu_sholat $waktu_sholat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatewaktu_sholatRequest  $request
     * @param  \App\Models\waktu_sholat  $waktu_sholat
     * @return \Illuminate\Http\Response
     */
    public function update(Updatewaktu_sholatRequest $request, waktu_sholat $waktu_sholat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\waktu_sholat  $waktu_sholat
     * @return \Illuminate\Http\Response
     */
    public function destroy(waktu_sholat $waktu_sholat)
    {
        //
    }
}
