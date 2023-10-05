@extends('./layouts.admin_layout')
@section('contents')
<div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                       Chỉnh Sửa Nhân Viên
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form method="post" action="{{url('admin/updata/'.$edit_user->id.'/'.$edit->MA_NV)}}" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-group">
                                    <label for="tennv">Tên Nhân Viên</label>
                                    <input type="text" class="form-control" required name="hoten_nv" id="tennv" value="{{$edit->HOTEN_NV}}">
                                   
                                </div>
                                  
                                <div class="form-group">
                                    <label for="tendn">Tên Đăng Nhập</label>
                                    <input type="text" class="form-control" name="ten_dn" id="tendn" value="{{$edit_user->username}}" >
                                </div>
                         
                                <div class="form-group" >
                                <div class="form-check form-check-inline d-inline " style="float: left; margin-left: 150px; margin-right: 50px;" >
                                    <input class="form-check-input form-check-inline" type="radio" value="1" name="quyen" id="flexRadioDefault1" >
                                    <label class="form-check-label" for="flexRadioDefault1" style="color: red;">
                                        QUẢN LÝ
                                    </label>
                                    </div>
                                    <div class="form-check form-check-inline d-inline ">
                                    <input class="form-check-input form-check-inline" value="0"  type="radio" name="quyen" id="flexRadioDefault2" checked >
                                    <label class="form-check-label" for="flexRadioDefault2" style="color: seagreen;">
                                      NHÂN VIÊN
                                    </label>
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <label for="passdn">Số Căn Cước Công Dân</label>
                                    <input type="number" class="form-control" id="cccd" name="cccd" value="{{$edit->CCCD}}" >
                                </div> 
                                <div class="form-group">
                                    <label for="passdn">Ảnh Avata</label>
                                    <input type="file" class="form-control"  id="image" onchange="readURL(this);" name="avata" >
                                    <img id="image-preview" src="{{asset($edit->AVATA)}}" style="max-width: 100%; max-height: 200px;">
                                    {{-- kết thúc sự kiện hiển thị avata hình ảnh --}}
        
                                    <script>
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();
                                    
                                                reader.onload = function (e) {
                                                    $('#image-preview')
                                                        .attr('src', e.target.result)
                                                        .css('max-width', '100%')
                                                        .css('max-height', '200px');
                                                };
                                    
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                    </script>
                                </div> 
                                <div class="form-group">
                                    <label for="tendn">Ngày Sinh</label>
                                    <input type="date" class="form-control" name="ns_nv" id="ns_nv"  >
                                </div>
                                <div class="form-group">
                                    <label for="tendn">Nơi Sinh Nhân Viên</label>
                                    <input type="text" class="form-control" name="noi_sinh" id="noi_sinh" value="{{$edit->NOI_SINH}}" >
                                </div>
                                <div class="form-group">
                                    <label for="tendn">Địa Chỉ Hiện Tại Đang Sinh Sống</label>
                                    <input type="text" class="form-control" name="dcht_nv" id="dcht_nv" value="{{$edit->DCHT_NV}}" >
                                </div>
                                <div class="text-center">
                                <button type="submit" class="btn btn-info">Cập Nhật Dữ Liệu</button>  
                                </div>
                                
                            </form>
                            </div>

                        </div>
                    </section>
                    

            </div>

@endsection