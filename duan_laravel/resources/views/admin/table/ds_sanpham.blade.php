@extends('./layouts.admin_layout')
@section('contents')

      		<div class="table-agile-info table-responsive">
 <div class="panel panel-default">
    <div class="panel-heading">
     Danh Sách Sản Phẩm
    </div>
    <div style="overflow-x: auto;
    white-space: nowrap; ">


      <table class="table table-responsive" >
        <thead>
            <tr>

            <th data-breakpoints="xs">STT</th>
            <th>Tên Sản Phẩm</th>
            <th>Avata</th>
            <th>Mô Tả Chi Tiết Sản Phẩm </th>
            <th>Số Lượng</th>
            <th>Giá</th>
            <th>ĐVT</th>
            <th>Người Đăng</th>
            <th data-breakpoints="xs">Thời Gian Đăng</th>        
            <th data-breakpoints="xs sm md" data-title="DOB">Hành Động</th>
            </tr>
            
        
        </thead>
        <tbody>
          
            <?php $dem=1 ?>
            @foreach($sanpham as $product)
         
    
          <tr data-expanded="true">
            <td><?php echo $dem++?></td>
              <td>{{$product->TEN_SP}}</td>
              <td><img src="{{asset($product->AVATA_SP)}}" style="max-width: 200px; height: 100px;" class="img-fluid" alt=""></td>
              <td style="white-space: normal; ">{{  Str::words($product->MOTA_SP, 38, '...') }}</td>
              <td>{{$product->SL_SP}}</td>
              <td>{{$product->GIA_SP}}</td>
              <td>{{$product->DVT}}</td>
              
         

              @php
              $loginUser=auth()->user();
              $nhanvien = \App\Models\Nhan_vien::find($loginUser->MA_NV);
          @endphp
          <td>{{$nhanvien->HOTEN_NV}}</td>
          <td>{{$product->created_at}}</td>

            
             
            
              <td>
        <a class="btn btn-primary"
        href="{{url('admin/product/edit/'.$product->MA_SP)}}">
        <i class="bi-pencil"></i>
        </a> 
      </td>
      <td>
        <form action="{{url('admin/xoa-san-pham/'.$product->MA_SP)}}"
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