<?php

namespace App\Http\Controllers;

use App\Models\Nhan_vien;
use App\Http\Requests\StoreNhan_vienRequest;
use App\Http\Requests\UpdateNhan_vienRequest;
use App\Models\User_nv;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.table.add_nhanvien');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $user = new User_nv;
        // $user->hoten_nv->$request->input('hoten_nv');
        
    }


    public function store(StoreNhan_vienRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nhan_vien  $nhan_vien
     * @return \Illuminate\Http\Response
     */
    public function show(Nhan_vien $nhan_vien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nhan_vien  $nhan_vien
     * @return \Illuminate\Http\Response
     */
    public function edit(Nhan_vien $nhan_vien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNhan_vienRequest  $request
     * @param  \App\Models\Nhan_vien  $nhan_vien
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNhan_vienRequest $request, Nhan_vien $nhan_vien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nhan_vien  $nhan_vien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nhan_vien $nhan_vien)
    {
        //
    }
}
