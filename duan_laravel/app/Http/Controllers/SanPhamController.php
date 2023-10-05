<?php

namespace App\Http\Controllers;

use App\Models\San_pham;
use App\Http\Requests\StoreSan_phamRequest;
use App\Http\Requests\UpdateSan_phamRequest;

class SanPhamController extends Controller
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
     * @param  \App\Http\Requests\StoreSan_phamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSan_phamRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\San_pham  $san_pham
     * @return \Illuminate\Http\Response
     */
    public function show(San_pham $san_pham)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\San_pham  $san_pham
     * @return \Illuminate\Http\Response
     */
    public function edit(San_pham $san_pham)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSan_phamRequest  $request
     * @param  \App\Models\San_pham  $san_pham
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSan_phamRequest $request, San_pham $san_pham)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\San_pham  $san_pham
     * @return \Illuminate\Http\Response
     */
    public function destroy(San_pham $san_pham)
    {
        //
    }
}
