<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('frontend/assets/css/base.css')}}" />
  <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}" />
  <link rel="stylesheet" href="{{asset('frontend/assets/css/grid.css')}}" />
  <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <title>DatGold</title>
</head>

<body>
  <style>
    #flash-message{
      position: fixed;
   margin-top: 300px;
      color: forestgreen;
      border: #26aa99;
      border-radius: 10px;
      text-align: center;
     font-size: 19px;
     width: 500px;
     height: 100px;
     background-color:#c7e1f0; 
     padding-top: 17px;
     margin-left: 50%;
     transform: translateX(-50%);
     font-weight: bold;
    
     z-index: 9999!important;
    }
  </style>
  
  <div class="header">
    <div class="container">
      <!-- navbar  -->
      <div class="navbar d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <!-- <span>Jual</span>
          <div class="hr1 mx-2"></div> -->
          <span>Tải ứng dụng</span>
          <div class="hr1 mx-2"></div>
          <span class="me-2">Kết nối</span>
          <img class="icon-media me-2 ml-2" src="{{asset('frontend/assets/facebook.png')}}" alt="" />
          <img class="icon-media me-2" src="{{asset('frontend/assets/instagram.png')}}" alt="" />
          <img class="icon-media me-2" src="{{asset('frontend/assets/pendidikan.png')}}" alt="" />
          <img class="icon-media me-2" src="{{asset('frontend/assets/line.png')}}" alt="" />
        </div>
        <div class="d-flex align-items-center">
          <img class="icon-media me-2" src="{{asset('frontend/assets/notif.png')}}" alt="" />
          <span class="me-2">Thông báo</span>
          <img class="icon-media me-2" src="{{asset('frontend/assets/bantuan.png')}}" alt="" />
          <span class="me-4">Hỗ trợ</span>
          <style>
            #logint:hover{
              background-color: #ff8652;
              border-radius: 5px;
            
            }
          </style>
          <span class="font-weight-bold ps-1 pe-1" id="logint"> <a href="{{URL::TO('/trang-chu/login')}}" style="text-decoration: none; color: #ffffff;">Đăng nhập</a></span>
          <div class="hr1 mx-2"></div>
          <span class="font-weight-bold ps-1 pe-1" id="logint"><a href="{{URL::TO('/trang-chu/dang-ki-tai-khoan')}}" style="text-decoration: none; color: #ffffff;">Đăng Kí</a></span>
        </div>
      </div>
      <!-- input search brand -->
      <div class="d-flex align-items-center mt-4">
        <div class="d-flex align-items-center">
          {{-- <img class="brand-img mr-2" src="{{asset('frontend/assets/brand.png')}}" alt="" /> --}}
          <span class="text-brand"><a href="{{URL::TO('/trang-chu')}}"class="text-brand text-decoration-none text-white">DatGold</a></span>
        </div>
        <div class="wrap-navbar-input">
          <div class="wrap-search">
            <form action="{{ route('pages.search') }}" method="GET">
              <input type="text" class="form-control" name="keyword" placeholder="Nhanh tay săn voucher lên đến 50%" />
              <div class="wrap-icon-s">
              <button type="submit" class="border-0" >  <img class="icon-media" class="img-fluid " src="{{asset('frontend/assets/search.png')}}" alt="" /></button>
            </div>
          </form>
           
           
            
            
          </div>
     
        </div>

        <!-- Phần Giỏ Hàng -->
        
        @php $cart = session()->get('cart');    @endphp
      
      
        <div class="header__cart">
          <div class="header__cart-wrap">
            @if(empty($cart))
            <i class="header__cart-icon fas fa-shopping-cart"></i>
            <span class="header__cart-notice">0</span>
          @else
          <i class="header__cart-icon fas fa-shopping-cart"></i>
          <span class="header__cart-notice">{{ count($cart) }}</span>
          <!-- No cart : header__cart-list--no-cart -->
          <div class="header__cart-list ">
            <!-- Nocart -->
            <span class="header__cart-list-no-cart-msg">
              Chưa có sản phẩm
            </span>
            <!-- Hascart -->
            <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
            <!-- Cart item -->
                          
                            <ul class="header__cart-list-item">
                              @foreach($cart as $item)
                            
                              <li class="header__cart-item">
                                <img src="{{asset($item['image'])}}" alt="" class="header__cart-img" />
                                <div class="header__cart-item-info">
                                  <div class="header__cart-item-head">
                                    <h5 class="header__cart-item-name">
                                     {{$item['name']}}
                                    </h5>
                                    <div class="header__cart-item-price-wrap">
                                      <span class="header__cart-item-price">{{ number_format($item['price'], 0, ',', '.') }}</span>
                                      <span class="header__cart-item-multiply">x</span>
                                      <span class="header__cart-item-qnt">{{$item['quantity']}}</span>
                                    </div>
                                  </div>
                                  <div class="header__cart-item-body">
                                    {{-- <span class="header__cart-item-description">Phân loại : Bạc</span> --}}
                         
                                    {{-- <span class="header__cart-item-remove"><a href="{{url('trang-chu/delete-cart/')}}">Xóa</a></span> --}}
                              
                                  </div>
                                </div>
                              </li>
                          
                          @endforeach
                            
                            </ul>

            <a href="{{url('trang-chu/xem-gio-hang')}}" class="header__cart-view-cart btn btn--primary">Xem giỏ hàng</a>
          </div>
          @endif
          </div>
        </div>
    
        <!-- Kết thúc phần Giỏ Hàng -->
      </div>
    </div>
  </div>
  
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
  <div class="content" >

  <img class="shape1" src="{{asset('frontend/assets/shape1.png')}}" alt=""  style="margin-top: -20px;"/>
  <img class="shape2" src="{{asset('frontend/assets/shape2.png')}}" alt="" style="margin-top: -20px;" />
  <img class="shape3" src="{{asset('frontend/assets/shape1.png')}}" alt="" style="margin-top: -20px;" />
  <img class="shape4" src="{{asset('frontend/assets/shape2.png')}}" alt="" style="margin-top: -20px;"/>




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
    
    <div class="container  pt-0 mt-0" >
      <!-- carousel -->
      <div class="row wrap-carousel " >
        <div class="col-8 h-100 pr-1" >
          <div id="carouselExampleIndicators" class="carousel slide h-100" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner h-100 ">
              @foreach($images as $index => $image)
              
              @if($image->LUACHON==0)
              <div class="carousel-item {{$index == 0 ? 'active' : ''}} h-100">
                 <a href="{{$image->LINK_ANH}}"><img src="{{asset($image->ANH_QC)}}" class="d-block w-100 h-100 " alt="..."></a> 
              </div>
          @endif
              @endforeach
          </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only"></span>
            </a>
          </div>
        </div>
        <div class="col-4 h-100 pl-0">
          
          @foreach($images as $index => $image)
          @if($image->LUACHON===1)
              <div class="h-50 mb-1">
                <a href="{{$image->LINK_ANH}}"> <img class="w-100 h-100" src="{{asset($image->ANH_QC)}}" alt="{{$image->LINK_ANH}}" /></a>
                 
              </div>
            
          @endif
      @endforeach
         
         
        </div>
      </div>

            @yield('content')
       
    </div>
  </div>

  <div class="footer">
    <div class="container pt-5">
      <strong class=" font-weight-bold fs-6">
        SHOPEE - GÌ CŨNG CÓ, MUA HẾT Ở SHOPEE
      </strong>
      <p class="desc">
        Shopee - ứng dụng mua sắm trực tuyến thú vị, tin cậy, an toàn và miễn phí! Shopee là nền tảng giao dịch trực
        tuyến hàng đầu ở Đông Nam Á,
        có trụ sở chính ở Singapore, đã có mặt ở khắp các khu vực Singapore, Malaysia, Indonesia, Thái Lan,
        Philippines, Đài Loan, Brazil, México & Colombia. Với sự đảm bảo của Shopee, bạn sẽ mua hàng trực tuyến an tâm
        và nhanh chóng hơn bao giờ hết!
      </p>

      <strong>MUA SẮM VÀ BÁN HÀNG ONLINE ĐƠN GIẢN, NHANH CHÓNG VÀ AN TOÀN</strong>
      <p class="mt-3">Nếu bạn đang tìm kiếm một trang web để mua và bán hàng trực tuyến thì Shopee.vn là một sự lựa chọn
        tuyệt vời dành cho bạn.
        Shopee là trang thương mại điện tử cho phép người mua và người bán tương tác và trao đổi dễ dàng thông tin về
        sản phẩm và chương trình khuyến mãi của shop. Do đó, việc mua bán trên Shopee trở nên nhanh chóng và đơn giản
        hơn. Bạn có thể trò chuyện trực tiếp với nhà bán hàng để hỏi trực tiếp về mặt hàng cần mua. Còn nếu bạn muốn tìm
        mua những dòng sản phẩm chính hãng, uy tín, Shopee Mall chính là sự lựa chọn lí tưởng dành cho bạn. Để bạn có
        thể dễ dàng khi tìm hiểu và sử dụng sản phẩm, Shopee Blog - trang blog thông tin chính thức của Shopee - sẽ giúp
        bạn có thể tìm được cho mình các kiến thức về xu hướng thời trang,
        review công nghệ, mẹo làm đẹp, tin tức tiêu dùng và deal giá tốt bất ngờ.</p>

      <p class="mt-2">Đến với Shopee, cơ hội để trở thành một nhà bán hàng dễ dàng hơn bao giờ hết. Chỉ với vài thao tác
        trên ứng dụng, bạn đã có thể đăng bán ngay những sản phẩm của mình. Không những thế, các nhà bán hàng có thể tự
        tạo chương trình khuyến mãi trên Shopee để thu hút người mua với những sản phẩm có mức giá hấp dẫn. Khi đăng
        nhập tại Shopee Kênh người bán, bạn có thể dễ dàng phân loại sản phẩm,
        theo dõi đơn hàng, chăm sóc khách hàng và cập nhập ngay các hoạt động của shop.</p>

      <strong class=" mt-5">TẢI ỨNG DỤNG SHOPEE NGAY ĐỂ MUA BÁN ONLINE MỌI LÚC, MỌI NƠI</strong>
      <p class="mt-2">
        Ưu điểm của ứng dụng Shopee là cho phép bạn mua và bán hàng mọi lúc, mọi nơi. Bạn có thể tải ứng dụng Shopee
        cũng như đăng sản phẩm bán hàng một cách nhanh chóng và tiện lợi. Ngoài ra, ứng dụng Shopee còn có những ưu điểm
        sau:
      </p>

      <li class="ms-5 mt-2">Giao diện thân thiện, đơn giản, dễ sử dụng. Bạn sẽ dễ dàng thấy được ngay những sản phẩm nổi
        bật cũng như dễ dàng tìm đến các ô tìm kiếm, giỏ hàng hoặc tính năng chat liền tay.</li>
      <li class="ms-5 mt-2">Ứng dụng tích hợp công nghệ quản lý đơn mua và bán hàng tiện lợi trên cùng một tài khoản.
        Bạn sẽ vừa là người mua hàng, vừa là người bán hàng rất linh hoạt, dễ dàng.</li>
      <li class="ms-5 mt-2">Cập nhập thông tin khuyến mãi, Shopee Flash Sale nhanh chóng và liên tục.</li>

      <p class="mt-3">Tại Shopee, bạn có thể lưu các mã giảm giá Shopee và mã miễn phí vận chuyển toàn quốc. Bên cạnh
        đó, Shopee cũng sẽ có những chiến dịch khuyến mãi lớn hằng năm như Shopee 2.2, Siêu hội tiêu dùng 15.3, Shopee
        4.4 sale, Shopee 5.5 sale, Shopee sale 7.7,Shopee sale 8.8, Shopee sale 9.9, Shopee 10.10 sale, Shopee 11.11
        sale, Shopee Sale sinh nhật; Khuyến Mãi Tết thả ga săn sale quà Tết chất lượng. Đây là thời điểm để người mua
        hàng có thể nhanh tay chọn ngay cho mình những mặt hàng ưa thích với mức giá giảm kỉ lục.
        Ngoài ra, bạn còn có thể thỏa thích săn sale vào các ngày trong tháng như Sale giữa tháng và Sale cuối tháng đón
        lương về .</p>

      <strong class="mt-3">MUA HÀNG HIỆU CAO CẤP GIÁ TỐT TẠI SHOPEE</strong>
      <p class="mt-2">Bên cạnh Shopee Premium, Shopee còn có rất nhiều khuyến mãi khủng cho hàng hiệu giảm đến 50%. Cộng
        với mã giao hàng miễn phí, Shopee cũng có các mã giảm giá được phân phối mỗi tháng từ rất nhiều gian hàng chính
        hãng tham gia chương trình khuyến mãi này. Bên cạnh đó, Shopee còn tập hợp rất nhiều thương hiệu đình đám được
        các nhà bán lẻ uy tín phân phối bán trên Shopee, top sản phẩm hot deal cho bạn săn sale luôn cập nhật mỗi giờ,
        mỗi ngày, đem đến cho bạn sự lựa chọn đa dạng, từ các hãng mỹ phẩm nổi tiếng hàng đầu như Kiehl's, MAC, Foreo,
        SK-II, Estee Lauder,... Đến những thương hiệu công nghệ nổi tiếng như camera hành trình Gopro, máy ảnh Fuifilm,
        webcam Hikvision, máy đọc sách Kindle,... Tại Shopee, bạn có thể dễ dàng tìm thấy các thương hiệu giày thể thao
        phổ biến hiện nay như: Converse, New Balance, Nike, Vans, Crocs,... </p>

      <strong class="mt-4">MUA HÀNG CHÍNH HÃNG TỪ CÁC THƯƠNG HIỆU LỚN VỚI SHOPEE</strong>
      <p class="mt-2">Mua hàng trên Shopee luôn là một trải nghiệm ấn tượng. Dù bạn đang có nhu cầu mua bất kỳ mặt hàng
        thời trang nam, thời trang nữ, đồng hồ, điện thoại, nước rửa tay khô hay khẩu trang N95 thì Shopee cũng sẽ đảm
        bảo cung cấp cho bạn những sản phẩm ưng ý. Bên cạnh đó, Shopee cũng có sự tham gia của các thương hiệu hàng đầu
        thế giới ở đa dạng nhiều lĩnh vực khác nhau. Trong đó có thể kể đến Samsung, OPPO, Xiaomi, Innisfree, Unilever,
        P&G, Biti’s,...Các thương hiệu này hiện cũng đã có cửa hàng chính thức trên Shopee Mall với hàng trăm mặt hàng
        chính hãng, được cập nhập liên tục. Là một kênh bán hàng uy tín, Shopee luôn cam kết mang lại cho khách hàng
        những trải nghiệm mua sắm online giá rẻ, an toàn và tin cậy. Mọi thông tin về người bán và người mua đều được
        bảo mật tuyệt đối. Các hoạt động giao dịch thanh toán tại Shopee luôn được đảm bảo diễn ra nhanh chóng, an toàn.
        Một vấn đề nữa khiến cho các khách hàng luôn quan tâm đó chính là mua hàng trên Shopee có đảm bảo không.</p>
      <p class="mt-2">Shopee luôn cam kết mọi sản phẩm trên Shopee, đặc biệt là Shopee Mall đều là những sản phẩm chính
        hãng, đầy đủ tem nhãn, bảo hành từ nhà bán hàng. Ngoài ra, Shopee bảo vệ người mua và người bán bằng cách giữ số
        tiền giao dịch đến khi người mua xác nhận đồng ý với đơn hàng và không có yêu cầu khiếu nại, trả hàng hay hoàn
        tiền nào. Thanh toán sau đó sẽ được chuyển đến cho người bán. Đến với Shopee ngay hôm nay để mua hàng online giá
        rẻ và trải nghiệm dịch vụ chăm sóc khách hàng tuyệt vời tại đây. Đặc biệt khi mua sắm trên Shopee Mall, bạn sẽ
        được miễn phí vận chuyển, giao hàng tận nơi và 7 ngày miễn phí trả hàng. Ngoài ra, khách hàng có thể sử dụng
        Shopee Xu để đổi lấy mã giảm giá có giá trị cao và voucher dịch vụ hấp dẫn. Tiếp đến là Shopee Home Club, Shopee
        Mum Club, Shopee Beauty Club và Shopee Book Club với các ưu đãi độc quyền từ các thương hiệu lớn có những khách
        hàng đã đăng ký làm thành viên. Hãy truy cập ngay Shopee.vn hoặc tải ngay ứng dụng Shopee về điện thoại ngay hôm
        nay!</p>
    </div>

    <footer style="background-color: #fbfbfb;">
      <div class="container pt-5">
        <div class="d-flex justify-content-between">
          <div class="d-flex flex-column">
            <strong class=" font-weight-bold">CHĂM SÓC KHÁCH HÀNG</strong>
            <p class="mb-1 mt-2 desc">Trung Tâm Trợ Giúp</p>
            <p class="mb-1 desc">Shopee Blog</p>
            <p class="mb-1 desc">Shopee Mall</p>
            <p class="mb-1 desc">Hướng Dẫn Mua Hàng</p>
          </div>
          <div class="d-flex flex-column ml-5">
            <strong class=" font-weight-bold">VỀ SHOPEE</strong>
            <p class="mb-1 mt-2 desc ">Giới Thiệu Về Shopee Việt Nam</p>
            <p class="mb-1 desc">Tuyển Dụng</p>
            <p class="mb-1 desc">Điều Khoản Shopee</p>
            <p class="mb-1 desc">Chính Sách Bảo Mật</p>
          </div>
          <div class="d-flex flex-column ml-5">
            <strong class=" font-weight-bold">THANH TOÁN</strong>

            <div class="d-flex align-items-center">
              <img src="{{asset('frontend/assets/thanhtoan.png')}}" alt="" width="240px" height="120px" class="mt-3" />
            </div>
            <strong class=" font-weight-bold mt-4">ĐƠN VỊ VẬN CHUYỂN</strong>

            <div class="d-flex align-items-center">
              <img src="{{asset('frontend/assets/vanchuyen.png')}}" alt="" width="240px" height="120px" class="mt-3" />
            </div>
          </div>
          <div class="d-flex flex-column ml-5">
            <strong class=" font-weight-bold">THEO DÕI CHÚNG TÔI TRÊN</strong>
            <div class="d-flex flex-column">
              <div class="d-flex align-items-center mt-3 ">
                <img src="{{asset('frontend/assets/facec.png')}}" width="20" height="20" alt="" />
                <span class="desc ml-3">Facebook</span>
              </div>
              <div class="d-flex align-items-center mt-2">
                <img src="{{asset('frontend/assets/instagram.png')}}" width="20" height="20" alt="" class="bi bi" />
                <span class="desc ml-3">Instagram</span>
              </div>
              <div class="d-flex align-items-center mt-2">
                <img src="{{asset('frontend/assets/facec.png')}}" width="20" height="20" alt="" />
                <span class="desc ml-3">Facebook</span>
              </div>
            </div>
          </div>
          <div class="d-flex flex-column ml-5">
            <strong class=" font-weight-bold">TẢI ỨNG DỤNG SHOPEE NGAY THÔI</strong>
            <div class="d-flex align-items-center mt-3">
              <img src="assets/barcode.png" alt="" />
              <div class="d-flex flex-column">
                <img src="assets/goggle.png" alt="" />
                <img src="assets/app.png" alt="" />
              </div>
            </div>
          </div>
        </div>

        <hr />

        <div class="d-flex justify-content-between mt-5 pb-3" style="color: #888">
          <span class="fs-6"> &copy; 2023 Shopee. Tất cả các quyền được bảo lưu. </span>
          <span class="fs-6">Quốc gia & Khu vực: Singapore | Indonesia | Đài Loan | Thái Lan | Malaysia |
            Việt Nam | Philipines |</span>
        </div>
      </div>
    </footer>

  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
  </script>
</body>

</html>