<?php

namespace App\Http\Controllers;

use App\Models\LoginController;
use App\Http\Requests\StoreLoginControllerRequest;
use App\Http\Requests\UpdateLoginControllerRequest;

class LoginControllerController extends Controller
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
     * @param  \App\Http\Requests\StoreLoginControllerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoginControllerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoginController  $loginController
     * @return \Illuminate\Http\Response
     */
    public function show(LoginController $loginController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoginController  $loginController
     * @return \Illuminate\Http\Response
     */
    public function edit(LoginController $loginController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLoginControllerRequest  $request
     * @param  \App\Models\LoginController  $loginController
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLoginControllerRequest $request, LoginController $loginController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoginController  $loginController
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoginController $loginController)
    {
        //
    }
}
