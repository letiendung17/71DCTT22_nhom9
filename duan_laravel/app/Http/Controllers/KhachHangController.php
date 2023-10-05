<?php

namespace App\Http\Controllers;

use App\Models\Khach_hang;
use App\Http\Requests\StoreKhach_hangRequest;
use App\Http\Requests\UpdateKhach_hangRequest;

class KhachHangController extends Controller
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
     * @param  \App\Http\Requests\StoreKhach_hangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKhach_hangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Khach_hang  $khach_hang
     * @return \Illuminate\Http\Response
     */
    public function show(Khach_hang $khach_hang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Khach_hang  $khach_hang
     * @return \Illuminate\Http\Response
     */
    public function edit(Khach_hang $khach_hang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKhach_hangRequest  $request
     * @param  \App\Models\Khach_hang  $khach_hang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKhach_hangRequest $request, Khach_hang $khach_hang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Khach_hang  $khach_hang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Khach_hang $khach_hang)
    {
        //
    }
}
