@extends('layouts.user_layout')
@section('content')
  
{{-- <script>
    window.onload = function() {
      alert("Trang của bạn đã được tải lại");
    };
  </script> --}}
  <style>
    .border {
  border: 1px solid #ccc; /* Kích thước và màu sắc đường viền */
  border-radius: 10px; /* Độ cong của góc */
  padding: 10px; /* Khoảng cách giữa đường viền và nội dung bên trong */
  overflow: hidden;
}
.box {
  position: relative;
  transform-style: preserve-3d;
  transition: all 0.5s ease;
  box-shadow: 0 -10px 10px -10px rgba(0, 0, 0, 0.5);
}
  </style>
    <div class="app__container box border" style="margin-top: 50px!important">
        <div class="grid wide">
            <div class="row sm-gutter app__content">
                <!-- Category -->
                <div class="col l-2 m-0 c-0">
                    <nav class="category">
                        <h3 class="category__heading">
                            Danh mục
                        </h3>
                        <ul class="category-list">
                         
                          @foreach($nganhhangall as $all)
                            @if($all->NH_CON===null)
                          <li class="datgoldshop-item datgold-item">
                            <a href="#" class="category-item__link">{{$all->TEN_NH}}</a>
                        </li>
                        @endif
						
     
            
                          @endforeach
                        
                          @foreach($nganhhang as $danhmuccon)
                     
                          <li class="datgoldshop-item" >
                              <a href="{{url('trang-chu/danh-muc/product/'.$danhmuccon->MA_NH)}}" class="category-item__link">{{$danhmuccon->TEN_NH}}</a>
                          </li>
                          
                     @endforeach
                 
                        </ul>
                        

                    </nav>
                </div>

                <div class="col l-10 m-12 c-12" >
                

                    <!-- Product -->
                    <div class="home-product" >
                  
                            @yield('product')
                    
	
                    </div>
                </div>
            </div>
        </div>
    </div>

	
	
	
   

                @endsection
