<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Anh_sp;
use App\Models\Khach_hang;
use App\Models\Nganh_hang;
use App\Models\Quang_cao;
use App\Models\San_pham;
use App\Models\Thong_tin_ct;
use App\Models\User_kh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
   public function index()
   {
    $viewData=[];
    $viewData["title"] = "Shopee_DQC";
    $nganhhang=Nganh_hang::all();
    $images=Quang_cao::all();
    $product=San_pham::all();
    
        return view('pages.trangchu', compact('nganhhang','viewData','images','product'));
   }
   public function login()
   {
    $viewData=[];
    $viewData["title"] = "Shopee_DQC";
        return view('pages.login')->with('viewData',$viewData);
   }
   public function kiemtra(Request $request){
    $credentials = $request->only('username', 'password');
    print_r($credentials);
    if (Auth::attempt($credentials)) {
        // Nếu đăng nhập thành công, chuyển hướng đến trang quản lý của admin
        // $this->middleware('admin');
        return redirect()->action([HomeController::class, 'index']);
        
        // echo"Đăng Nhập Thành Công";
    }else{
    // Nếu đăng nhập thất bại, quay lại trang đăng nhập
    Session::put("message", "Tên Tài Khoản Hoặc Mật Khẩu Không Đúng❗");
    return redirect()->back()->withInput($request->only('username'));

    }

    }

   public function signup()
   {
    $viewData=[];
    $viewData["title"] = "Shopee_DQC";
        return view('pages.signup')->with('viewData',$viewData);
   }

//    lưu thông tin đăng kí tài khoản
public function insert(Request $request){
$data=new Khach_hang;
$data->TEN_KH=$request->input("ten_kh");
$data->DIACHI=$request->input("diachi");
$data->SDT=$request->input("sdt");

$request->validate([
    'avata' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
]);

$image = $request->file('avata');
$imageName = time().'.'.$image->getClientOriginalExtension();
$image->move(public_path('images'), $imageName);

// Lưu đường dẫn hình ảnh vào cơ sở dữ liệu
$imagePath = 'images/'.$imageName;
$data->AVATA=$imagePath;
$data->save();

$data2 = new User_kh;
$data2->MA_KH=$data->MA_KH;
$data2->username=$request->input("ten_dn");
$Password = $request->password;
$hashedPassword = Hash::make($Password);
$data2->password=$hashedPassword;
$data2->save();


return Redirect::to("/trang-chu/login");


}


// phần danh mục sản phẩm
public function danhmuc($MA_NH){
    
    $nganhhang = Nganh_hang::where('NH_CON', $MA_NH)->get();
    $nganhhangall = Nganh_hang::where('MA_NH',$MA_NH)->get();
   $sanpham=San_pham::where('MA_NH',$MA_NH)->get();
$images=Quang_cao::all();

return view('pages.sanpham')->with('images',$images)->with('nganhhang',$nganhhang)->with('sanpham',$sanpham)->with('nganhhangall',$nganhhangall);
}

//phần chi tiết sản phẩm
public function chitietsp($MA_SP){
    $product=San_pham::find($MA_SP);
    $images=Quang_cao::all();
    $anh_sps = Anh_sp::where('MA_SP', $product->MA_SP)->get();
   

    $ttct=Thong_tin_ct::where('MA_NH',$product->MA_NH)->get();

    return view('pages.chitiet_product')->with('product',$product)->with('images',$images)->with('anh_sps',$anh_sps)->with('ttct',$ttct);


}
public function product_nhcon($MA_NH){
$sanpham=San_pham::where('NH_CON',$MA_NH)->get();
$nganhhang = Nganh_hang::where('NH_CON', $MA_NH)->get();
$nganhhangall = Nganh_hang::where('MA_NH',$MA_NH)->get();
$images=Quang_cao::all();
return view('pages.sanphamconnganhhang', ['nganhhang' => $nganhhang, 'nganhhangall' => $nganhhangall,'images'=>$images,'sanpham'=>$sanpham]);

}
public function search(Request $request)
{
    $keyword = $request->input('keyword');

    $products = San_pham::where('TEN_SP', 'like', '%'.$keyword.'%')->get();
    $images=Quang_cao::all();
    return view('pages.search', ['products' => $products],['images'=>$images]);
}
}
