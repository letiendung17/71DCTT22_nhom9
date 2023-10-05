<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nhan_vien;
use App\Models\User_nv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class NhanvienController extends Controller
{
    public function index()
    {
        return view('admin.table.add_nhanvien');
    }
    public function create(Request $request)
    {
        $nhanvien = new Nhan_vien;   
        $nhanvien->hoten_nv=$request->input('hoten_nv');
        $nhanvien->cccd=$request->input('cccd');
        $nhanvien->ns_nv=$request->input('ns_nv');
        $nhanvien->noi_sinh=$request->input('noi_sinh');
        $nhanvien->dcht_nv=$request->input('dcht_nv');
        
        $request->validate([
            'avata' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $image = $request->file('avata');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        
        // Lưu đường dẫn hình ảnh vào cơ sở dữ liệu
        $imagePath = 'images/'.$imageName;
        $nhanvien->avata=$imagePath;
    
        $nhanvien->save();

        $Password = $request->pass_dn;

        
        $passnhaplai = $request->passnhaplai;
    
        if($passnhaplai===$Password){
            $hashedPassword = Hash::make($Password);

        }else{
            Session::put("message", "Mật Khẩu Không Trùng Nhau. Vui Lòng Nhập Lại❗");
            
            return Redirect::to("/them-nhan-vien");
            // return false;
        }
        $user = new User_nv;
        $user->MA_NV= $nhanvien->MA_NV;
        $user->username=$request->input('ten_dn');
        $user->password = $hashedPassword;
        $user->quyen=$request->input('quyen');
        $user->save();

        return Redirect::to("/admin/danh-sach-nhan-vien");
        
      
    }
    public function show()
    {
        $data = User_nv::with('nhanvien')->get();
        return view('admin.table.ds_nhanvien')->with(['data'=>$data]);
        // foreach($data as $item){
        //     print_r($item->nhanvien()->nhanvien);
        // }

        // return $data;
      
        
        // return view('admin.table.ds_nhanvien',compact('data'));
    }
    public function delete($id,$MA_NV){
        $xoa=Nhan_vien::find($MA_NV);
        $xoa_user=User_nv::find($id);
        $xoa_user->delete();
        $xoa->delete();

        // Session::put("message", "Đã Xóa Thành Công");
        return redirect()->route('admin.table.ds_nhanvien')
        ->with('success','Employee deleted successfully');
    }
    public function edit_nv($id,$MA_NV){
        $edit=Nhan_vien::find($MA_NV);
        $edit_user=User_nv::find($id);
      return view('admin.table.edit_nhanvien',compact('edit','edit_user'));
        // Session::put("message", "Đã Xóa Thành Công");
        // return redirect()->route('admin.table.ds_nhanvien')
        // ->with('success','Employee deleted successfully');
    }
    public function updata_nv(Request $request,$id,$MA_NV){
        $upnv=Nhan_vien::find($MA_NV);
        $upur=User_nv::find($id);

        $upnv->HOTEN_NV=$request->input('hoten_nv');
        $upnv->CCCD=$request->input('cccd');
        $upnv->NS_NV=$request->input('ns_nv');
        $upnv->NOI_SINH=$request->input("noi_sinh");
        $upnv->DCHT_NV=$request->input("dcht_nv");
        $request->validate([
            'avata' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $image = $request->file('avata');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        
        // Lưu đường dẫn hình ảnh vào cơ sở dữ liệu
        $imagePath = 'images/'.$imageName;
        $upnv->avata=$imagePath;
    
        $upnv->save();
    $upur->username=$request->input('ten_dn');
        $upur->QUYEN=$request->input('quyen');
        $upur->save();

        return Redirect::to("/admin/danh-sach-nhan-vien");

    }
}
