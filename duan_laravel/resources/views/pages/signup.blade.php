<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập tài khoản - Mua sắm online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('frontend/css/signup.css')}}">
    <link rel="icon" href="{{asset('frontend/assets/brand.png')}}">
</head>


<header>
    <div class="container">
        <div class="row p-4">
            <div class="col">
                <img src="assets/logoshopee.png" alt="" class="img-fluid ">
                <div class="d-inline mt-3">
                <img class="brand-img mr-2 img-fluid" src="{{asset('frontend/assets/brand.png')}}" style="width: 50px; height: 50px; border-radius: 5px;"   alt="" />
          <span class="text-brand"><a href="{{URL::TO('/trang-chu')}}" class="text-brand text-decoration-none fs-4" style="color: #ee4d2d; font-weight: bold;">Shopee</a></span>
                    <p class="d-inline fs-4 fw-bold p-4 mt-3">Đăng Kí</p>
                </div>

            </div>
            <div class="col">
                <p class="text-end mt-3" style="color: #ee4d2d;;">Bạn cần giúp đỡ ?</p>
            </div>
        </div>
    </div>
</header>

<body>

    <div id="background-login">
        <div class="form-container container-fluid">
            <div class="text-start fs-3 ms-5 mt-3">Đăng Kí</div>
            <form id="login-form" action="{{url('trang-chu/dang-ki-tai-khoan-thanh-cong')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                    <input type="text" name="ten_kh" id="nameUser" placeholder="Họ Và tên ">
                </div>
                <div class="form-group">

                    <input type="text" name="ten_dn" id="username" placeholder="Tên Đăng Nhập">
                </div>
                <div class="form-group">
                    <input type="password" name="pass_dn" id="password" placeholder="Mật Khẩu">
                </div>
                <div class="form-group">
                    <input type="text" name="diachi" id="address" placeholder="Địa chỉ Nhận Hàng">
                </div>
                <div class="form-group">
                    <input type="text" name="sdt" id="telphone" placeholder="Số điện thoại ">
                </div>
                <div class="form-group">
                    <label for="avatar">Ảnh đại diện: </label>
                    <input type="file" name="avata" id="avata">
                    <img id="preview" style="display:none; width:100px; margin-left: 200px; " class="img-fluid mt-1">
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
                <input type="submit" value="Đăng Kí" style="margin-top: -30px;">
             
            </form>
            <p>Bạn Đã Có Tài Khoản? <a href="/log-in" class="text-decoration-none">Đăng Nhập</a></p>
        </div>
    </div>
    
</body>


</html>