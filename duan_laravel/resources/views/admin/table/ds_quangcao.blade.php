@extends('./layouts.admin_layout')
@section('contents')

      		<div class="table-agile-info table-responsive">
 <div class="panel panel-default">
    <div class="panel-heading">
     Danh Sách Quảng Cáo
    </div>
    <div>

      <table class="table" >
        <thead>
            <tr>

            <th data-breakpoints="xs">STT</th>
            <th>Ảnh Quảng Cáo</th>
            <th>Link Quảng Cáo</th>
            <th>Quảng Cáo Thương Hiệu</th>
            <th>Thời Hạn Quảng Cáo</th>
            <th data-breakpoints="xs">Tác Giả</th>        
            <th data-breakpoints="xs sm md" data-title="DOB">Hành Động</th>
            </tr>
            
        
        </thead>
        <tbody>
     
            <?php $dem=1 ?>
            @foreach ($data_qc as $row)
          <tr data-expanded="true">
            <td><?php echo $dem++?></td>
           <td><img src="{{asset($row->ANH_QC)}}" alt="{{$row->ANH_QC}}" style="max-width: 200px;" class="img-fluid"></td>
           <td>{{$row->LINK_ANH}}</td>
          
           <td>
            @foreach($data_th as $row_th) 
            @if($row_th->MA_TH==$row->MA_TH)
            {{$row_th->TEN_TH}}
            @endif
            @endforeach
           </td>
          
           <td>{{$row->THOI_HAN}}</td>
           @php
           $loginUser=auth()->user();
           $nhanvien = \App\Models\Nhan_vien::find($loginUser->MA_NV);
       @endphp
       <td>{{$nhanvien->HOTEN_NV}}</td>
       <td>
        <a class="btn btn-primary"
        href="{{url('admin/edit-qc/'.$row->ID_QC)}}">
        <i class="bi-pencil"></i>
        </a> 
      </td>
      <td>
        <form action="{{url('admin/delete-qc/'.$row->ID_QC)}}"
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