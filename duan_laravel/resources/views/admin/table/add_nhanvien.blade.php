@extends('./layouts.admin_layout')
@section('contents')
<div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                         Thêm Một Nhân Viên Mới
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form method="post" action="{{URL::TO('/admin/create-nhanvien')}}" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-group">
                                    <label for="tennv">Tên Nhân Viên</label>
                                    <input type="text" class="form-control" required name="hoten_nv" id="tennv" value="Nhập Họ Và Tên Nhân Viên" onfocus="this.value=''">
                                   
                                </div>
                                  
                                <div class="form-group">
                                    <label for="tendn">Tên Đăng Nhập</label>
                                    <input type="text" class="form-control" name="ten_dn" id="tendn" value="Nhập Tên Tài khoản Đăng Nhập" onfocus="this.value=''" >
                                </div>
                                <div class="form-group">
                                    <label for="passdn">Password</label>
                                    <input type="password" class="form-control" id="passdn" name="pass_dn" >
                                </div>
                                <div class="form-group">
                                    <label for="passdn">Nhập Lại Password</label>
                                    <input type="password" class="form-control" id="passdn" name="passnhaplai" >
                                </div> 
                                <p>
                                <?php 
                                        use Illuminate\Support\Facades\Session;
                                        
                                        $message=Session::get('message');
                                        if($message){
                                            echo "<p id='canhbao'>$message</p>";
                                            Session::put("message",null); //chỉ cho message hiển thị một lần thôi
                                        }
                                        ?> 
                                </p>    
                                <div class="form-group" >
                                <div class="form-check form-check-inline d-inline " style="float: left; margin-left: 150px; margin-right: 50px;" >
                                    <input class="form-check-input form-check-inline" type="radio" value="1" name="quyen" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1" style="color: red;">
                                        QUẢN LÝ
                                    </label>
                                    </div>
                                    <div class="form-check form-check-inline d-inline ">
                                    <input class="form-check-input form-check-inline" value="0" type="radio" name="quyen" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2" style="color: seagreen;">
                                      NHÂN VIÊN
                                    </label>
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <label for="passdn">Số Căn Cước Công Dân</label>
                                    <input type="number" class="form-control" id="cccd" name="cccd" >
                                </div> 
                                <div class="form-group">
                                    <label for="passdn">Ảnh Avata</label>
                                    <input type="file" class="form-control" id="avata" name="avata" >
                                    <img id="preview" style="display:none; width:200px;">
                            {{-- sự kiện hiển thị hình ảnh avata --}}
                            <script>
                                document.getElementById("avata").addEventListener("change", function() {
                                    let preview = document.getElementById("preview");
                                    let file = this.files[0];
                                    let reader = new FileReader();

                                    reader.onloadend = function() {
                                        preview.src = reader.result;
                                        preview.style.display = "block";
                                    }

                                    if (file) {
                                        reader.readAsDataURL(file);
                                    } else {
                                        preview.src = "";
                                    }
                                });
                            </script>
                                </div> 
                                <div class="form-group">
                                    <label for="tendn">Ngày Sinh</label>
                                    <input type="date" class="form-control" name="ns_nv" id="ns_nv"  >
                                </div>
                                <div class="form-group">
                                    <label for="tendn">Nơi Sinh Nhân Viên</label>
                                    <input type="text" class="form-control" name="noi_sinh" id="noi_sinh" value="Nhập Nơi Sinh Của Nhân Viên" onfocus="this.value=''" >
                                </div>
                                <div class="form-group">
                                    <label for="tendn">Địa Chỉ Hiện Tại Đang Sinh Sống</label>
                                    <input type="text" class="form-control" name="dcht_nv" id="dcht_nv" value="Nhập Địa Chỉ Hiện Tại Của Nhân Viên" onfocus="this.value=''" >
                                </div>
                                <div class="text-center">
                                <button type="submit" class="btn btn-info">Thêm Dữ Liệu</button>  
                                </div>
                                
                            </form>
                            </div>

                        </div>
                    </section>
                    

            </div>

@endsection