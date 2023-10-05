<?php

namespace App\Http\Controllers;

use App\Models\Phanloai_sp;
use App\Http\Requests\StorePhanloai_spRequest;
use App\Http\Requests\UpdatePhanloai_spRequest;

class PhanloaiSpController extends Controller
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
     * @param  \App\Http\Requests\StorePhanloai_spRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePhanloai_spRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Phanloai_sp  $phanloai_sp
     * @return \Illuminate\Http\Response
     */
    public function show(Phanloai_sp $phanloai_sp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phanloai_sp  $phanloai_sp
     * @return \Illuminate\Http\Response
     */
    public function edit(Phanloai_sp $phanloai_sp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePhanloai_spRequest  $request
     * @param  \App\Models\Phanloai_sp  $phanloai_sp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhanloai_spRequest $request, Phanloai_sp $phanloai_sp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phanloai_sp  $phanloai_sp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phanloai_sp $phanloai_sp)
    {
        //
    }
}
