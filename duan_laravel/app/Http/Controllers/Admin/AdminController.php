<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gio_hang;
use App\Models\Khach_hang;
use App\Models\Nhan_vien;
use App\Models\User_nv;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

session_start();
class AdminController extends Controller
{

public function loi404(){
    return view('layouts.404');
}

    public function showLoginForm()
    {
        return view('layouts.login');
    }

    public function login(Request $request)
    {
   
        $credentials = $request->only('username', 'password');
        print_r($credentials);
        if (Auth::attempt($credentials)) {
            // Nếu đăng nhập thành công, chuyển hướng đến trang quản lý của admin
            // $this->middleware('admin');
            return redirect()->action([AdminController::class, 'dashboard']);
        }
        // Nếu đăng nhập thất bại, quay lại trang đăng nhập
        Session::put("message", "Tên Tài Khoản Hoặc Mật Khẩu Không Đúng❗");
        return redirect()->back()->withInput($request->only('ten_dn'));
  
        
    }
    // public function index()
    // {
    //     $viewData = [];
    //     $viewData['title'] = 'Adimnistrator-DQC';
    //     $viewData['canhbao'] = "";
    //     return view('layouts.login')->with('viewData',$viewData);
    // }
    public function dashboard()
    {
        $viewData = [];
        $viewData['title'] = 'Adimnistrator-DQC';
   
        return view('admin.admin_dashboard');
       
    }
    // public function kiemtra_dn(Request $request)
    // {
    //     $ten_dn = $request->ten_dn;
    //     $pass_dn = md5($request->pass_dn);
    //     $kiemtra = DB::table('user_nv')->where('ten_dn', $ten_dn)->where('pass_dn', $pass_dn)->first();
    //     if($kiemtra==true){ 
            // Session::put("hoten_nv", $kiemtra2->ma_nv);
            // Session::put("ma_nv", $kiemtra2);
            // $user = Auth::User();
            // if ($user) {
            //     $nhanvien = $user->nhanvien->first();
            //     return view('admin.admin_dashboard',compact('nhanvien'));
            // }    else{
            //     echo "khong lay duoc du lieu";
            // }
        //    return Redirect::to("/dashboard");
        
           
        // }else{
        //     Session::put("message", "Tên Tài Khoản Hoặc Mật Khẩu Không Đúng❗");
        //     return Redirect::to("/admin");
        // }
 
        
    // }
    public function dangxuat()
    {
        Auth::logout();
        Session::flush();
       return Redirect::to("/admin");
    }
public function donhang(){

$giohang=Gio_hang::with('khachhang')->get();
return view('admin.table.ds_donhang')->with('giohang',$giohang);

}
public function xoadonhang($ID_GH,$MA_KH){
$xoagh=Gio_hang::find($ID_GH);
$xoakh=Khach_hang::find($MA_KH);

$xoagh->delete();
$xoagh->delete();
return redirect()->route('admin.table.ds_donhang')->with('thongbao','Bạn Đã Đặt Hàng Thành Công');
}
}
