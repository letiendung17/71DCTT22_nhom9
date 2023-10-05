@extends('./layouts.admin_layout')
@section('contents')
      		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Danh Sách Ngành Hàng
    </div>
    <div>

      <table class="table" >
        <thead>
            <tr>

            <th data-breakpoints="xs">STT</th>
            <th>Tên Ngành Hàng</th>
            <th>Ảnh Ngành Hàng</th>
          
            <th data-breakpoints="xs sm md" data-title="DOB">Hành Động</th>
            </tr>
            
        
        </thead>
        <tbody>
     
            <?php $stt=1;
       
            ?>
                  
            @foreach ($data as $row)
            @if($row->NH_CON===Null)
          <tr data-expanded="true">
        
            <td><?php echo $stt++?></td>
           
           
                <td>{{ $row->TEN_NH }}</td>
           <td><img src="{{asset($row->ANH_NH)}}" alt="{{$row->TEN_NH}}" style="max-width: 80px;"></td>
           
                {{-- <td>{{$row->TEN_TTCT}}</td> 
                <td>{{$row->NOIDUNG_OPTION}}</td>  --}}

        

          
               
         
      {{-- <td>
        <a class="btn btn-primary"
        href="">
        <i class="bi-pencil"></i>
        </a> 
      </td> --}}
      <td>
        <form action="{{url('admin/delete/nganh-hang/'.$row->MA_NH)}}"
        method="POST">
        @csrf
      
        <button class="btn btn-danger">
        <i class="bi-trash"></i>
        </button>
        </form>
      </td>

      


          </tr>
         
          @endif 
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>        

@endsection