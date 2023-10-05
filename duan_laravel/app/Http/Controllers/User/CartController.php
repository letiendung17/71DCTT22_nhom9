<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Gio_hang;
use App\Models\Khach_hang;
use App\Models\Nganh_hang;
use App\Models\Quang_cao;
use App\Models\San_pham;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function giohang(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
            $product = San_pham::find($productId);

            if (!$product) {
                abort(404);
            }

            $cart[$productId] = [
                'name' => $product->TEN_SP,
                'price' => $product->GIA_SP,
                'quantity' => $quantity,
                'image' => $product->AVATA_SP,
                'id' => $product->MA_SP,
                'mota' => $product->MOTA_SP,
            ];
        }

        // Lưu thông tin giỏ hàng vào session
        session()->put('cart', $cart);

        return redirect()->route('pages.trangchu')->with('thongbao', 'Sản Phẩm Đã Được Thêm Vào Giỏ Hàng Thành Công ');
    }

    public function xemgiohang()
    {
        $viewData = [];
        $viewData["title"] = "Shopee_DQC";
        $nganhhang = Nganh_hang::all();
        $images = Quang_cao::all();
        $product = San_pham::all();

        return view('pages.ds_cart', compact('nganhhang', 'viewData', 'images', 'product'));
    }
    public function deletecart($id)
    {
        // Lấy thông tin giỏ hàng từ session
        $cart = session()->get('cart', []);

        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
        if (isset($cart[$id])) {
            // Xóa sản phẩm khỏi giỏ hàng
            unset($cart[$id]);

            // Cập nhật lại giỏ hàng trong session
            session()->put('cart', $cart);

            return redirect()->route('giohang.danhsach')->with('thongbao', 'Sản phẩm đã được xóa khỏi giỏ hàng thành công');
        }

        return redirect()->route('giohang.danhsach')->with('thongbao', 'Sản phẩm không tồn tại trong giỏ hàng');
    }
    public function thanhtoan()
    {
        return view('pages.thanhtoan');
    }
    public function thanhcong(Request $request)
    {
        $giohang = new Gio_hang();
        $khachhang = new Khach_hang();
        $khachhang->TEN_KH = $request->input("hovaten");
        $khachhang->email = $request->input('email');
        $khachhang->DIACHI = $request->input('diachi');
        $khachhang->SDT = $request->input('sodienthoai');

        $khachhang->save();
        $giohang->MA_KH = $khachhang->MA_KH;
        $cart = session()->get('cart');
        $total_price = 0;
        if ($cart) {
            $dem = count($cart);
            foreach ($cart as $item) {
                $gia = $item['quantity'] * $item['price'];
                // $total_price += $item['quantity'] * $item['price'];

                $giohang = new Gio_hang();
                $giohang->MA_KH = $khachhang->MA_KH;
                $giohang->TEN_SP = $item['name'];
                $giohang->SOLUONG_SP = $item['quantity'];
                $giohang->TONG_TIEN = $gia;
                // $giohang->TONG_TIEN_TT =$total_price;
                $giohang->save();
            }
        }




        return redirect()->route('pages.trangchu')->with('thongbao', 'Bạn Đã Đặt Hàng Thành Công');
    }
}
