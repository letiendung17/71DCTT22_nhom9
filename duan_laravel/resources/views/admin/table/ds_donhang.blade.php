@extends('./layouts.admin_layout')
@section('contents')

      		<div class="table-agile-info table-responsive">
 <div class="panel panel-default">
    <div class="panel-heading">
     Danh Sách Đơn Hàng
    </div>
    <div style="overflow-x: auto;
    white-space: nowrap; ">


      <table class="table table-responsive" >
        <thead>
            <tr>

            <th data-breakpoints="xs">STT</th>
            <th>Tên Khách Hàng</th>
            <th>Email</th>
            <th>Địa Chỉ</th>
            <th>Số Điện Thoại</th>
            <th>Sản Phẩm Đặt</th>
            <th>Số Lượng</th>
            <th>Tổng Tiền</th>
            <th data-breakpoints="xs">Check</th>        
            <th data-breakpoints="xs sm md" data-title="DOB">Hành Động</th>
            </tr>
            
        
        </thead>
        <tbody>
          
            <?php $dem=1 ?>
            @foreach($giohang as $kh)
            
    
          <tr data-expanded="true">
            <td><?php echo $dem++?></td>
              <td>{{$kh->khachhang->TEN_KH}}</td>
              <td>{{$kh->khachhang->email}}</td>
              <td>{{$kh->khachhang->DIACHI}}</td>
              <td>{{$kh->khachhang->SDT}}</td>
              <td>{{$kh->TEN_SP}}</td>
              <td>{{$kh->SOLUONG_SP}}</td>
              <td>{{ number_format($kh->TONG_TIEN, 0, ',', '.')}}</td>
              {{-- @php
              $loginUser=auth()->user();
              $nhanvien = \App\Models\Nhan_vien::find($loginUser->MA_NV);
          @endphp
          <td>{{$nhanvien->HOTEN_NV}}</td>
          <td>{{$product->created_at}}</td> --}}

 
           <td>   
        <form action="{{url('donhang/delete/'.$kh->ID_GH.'/'.$kh->khachhang->MA_KH)}}"
          method="POST">
          @csrf
          {{-- @method('DELETE') ; --}}
          <button type="submit" class="btn btn-danger">
          <i class="bi-trash"></i>
          </button>

          </form>
      </td>

          </tr>
   
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>        

@endsection