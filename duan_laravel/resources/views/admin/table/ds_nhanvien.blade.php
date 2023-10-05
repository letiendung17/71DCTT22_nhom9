@extends('./layouts.admin_layout')
@section('contents')

      		<div class="table-agile-info table-responsive">
 <div class="panel panel-default">
    <div class="panel-heading">
     Danh Sách Nhân Viên
    </div>
    <div>

      <table class="table" >
        <thead>
            <tr>

            <th data-breakpoints="xs">STT</th>
            <th>Họ Tên Nhân Viên</th>
            <th>Tên Đăng Nhập</th>
            <th>Ngày Sinh</th>
            <th>Quyền</th>
            <th>Avata</th>
            <th>Địa Chỉ</th>
            <th data-breakpoints="xs">Nơi Cư Trú Hiện Tại</th>        
            <th data-breakpoints="xs sm md" data-title="DOB">Hành Động</th>
            </tr>
            
        
        </thead>
        <tbody>
     
            <?php $dem=1 ?>
            @foreach ($data as $row)
          <tr data-expanded="true">
            <td><?php echo $dem++?></td>
           <td>{{$row->Nhanvien->HOTEN_NV}}</td>
           <td>{{$row->TEN_DN}}</td>
           <td>{{$row->Nhanvien->NS_NV}}</td>
          <td><?php if($row->QUYEN==0){echo "Nhân Viên";}else{echo "Admin";}?> </td>
          <td><img src="{{ asset($row->Nhanvien->AVATA) }}" alt="{{ $row->Nhanvien->HOTEN_NV }}" style="max-width: 80px; border-radius: 50%;"></td>
           <td>{{$row->Nhanvien->NOI_SINH}}</td>
           <td>{{$row->Nhanvien->DCHT_NV}}</td>
                 
      <td>
        <a class="btn btn-primary"
        href="{{url('admin/edit/'.$row->id.'/'.$row->Nhanvien->MA_NV)}}">
        <i class="bi-pencil"></i>
        </a> 
      </td>
      <td>
        <form action="{{url('admin/xoa-nhan-vien/'.$row->id.'/'.$row->Nhanvien->MA_NV)}}"
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