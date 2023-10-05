@extends('./layouts.admin_layout')
@section('contents')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
<div class="col-lg-12">
    <style>
        #flash-message{
          position: fixed;
            margin-top: 80px;
          color: forestgreen;
          border: #26aa99;
          border-radius: 10px;
          text-align: center;
         font-size: 19px;
         width: 500px;
         height: 100px;
         background-color:#c7e1f0; 
         padding-top: 17px;
         margin-left: 40%;
         transform: translateX(-50%);
         font-weight: bold;
        
         z-index: 9999!important;
        }
      </style>
                    <section class="panel">
                        <header class="panel-heading">
                          Thêm Danh Mục Con
                        </header>
                        <div class="panel-body">
                            @if(session('thongbao'))
                            <div id="flash-message">
                            <div role="alert" >
                               <i class="fas fa-check-circle fa-lg fa-fw"></i> {{ session('thongbao') }}
                            </div>
                          </div>
                          @endif
                          
                           <script>
                            setTimeout(function() {
                              document.getElementById('flash-message').remove();
                            }, 3000);
                          </script>
                            <div class="position-center">
                                <form role="form" action="them-moi-danh-muc-con" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Danh Mục</label>
                                    <input type="text" class="form-control" name="danhmuccon" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                              
                                <div class="form-group">
                                <label for="exampleInputEmail1">Danh Mục Thuộc Ngành Hàng Nào?</label>
                                <select class="form-control m-bot15" name="nganhhangchon" style="color: #72537d; font-weight: bold;">
                                    <option value="">Chọn Ngành Hàng</option>
                                @foreach($data_nh as $option)
                                    @if($option->NH_CON != NULL)
                                        @continue
                                    @endif
                                    <option value="{{$option->MA_NH}}">{{$option->TEN_NH}}</option>
                                    @endforeach
                            </select>
                                   
                                </div>
                                
                              
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>

@endsection