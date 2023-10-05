@extends('layouts.user_layout')
@section('content')

<style>
    .kategory {
  border: 1px solid #ccc; /* thiết lập đường viền với màu xám nhạt */
  border-radius: 10px; /* bo tròn góc khung */
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* thêm đổ bóng cho khung */
}

.card-kategory {
  padding: 10px;
  margin-right: 10px;
}

.wrap-img {
  width: 120px;
  height: 120px;
  overflow: hidden;
  border-radius: 10px;
}

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
    <!-- Bắt Đầu Danh Mục Sản Phẩm -->
    <div class="row mx-0 mt-5 kategory pb-4 box" style="margin-top: 50px!important ">
        <h5 class="p-4">DANH MỤC</h5>
        <div class="d-flex">
            @foreach ($nganhhang as $danhmuc)
                @if ($danhmuc->NH_CON === null)
                    <div class="d-flex flex-column align-items-center card-kategory">
                        <div class="wrap-img">
                            <a href="{{ url('trang-chu/danhmuc/' . $danhmuc->MA_NH) }}">

                                <img class="w-100 h-100" src="{{ asset($danhmuc->ANH_NH) }}" alt="{{ $danhmuc->TEN_NH }}" />
                            </a>

                        </div>
                        <a href="{{ url('trang-chu/danhmuc/' . $danhmuc->MA_NH) }}"
                            class="text-decoration-none text-black text-center">
                            <p class="mb-0 flex-column mt-2">{{ $danhmuc->TEN_NH }}</p>
                        </a>

                    </div>
                @endif
            @endforeach

        </div>


    </div>

    <!--  Kết Thúc Danh Mục Sản Phẩm -->



    <!-- Bắt Đầu Sản Phẩm Nổi Bật -->

    <div class="row mx-0 mt-4 border box" style="background-color: #ffffff">
        <div class="d-flex flex-column w-100 pt-4 pb-2">
            <div class="d-flex justify-content-between w-100 px-4 pb-2">
                <h4 style="color: #888">SẢN PHẨM NỔI BẬT</h4>
                {{-- <div class="d-flex align-items-center" style="color: #f53d2d">
              <span> Lihat Semua </span>
              <span class="h4 mb-0 ml-2">></span>
            </div> --}}
            </div>
            <div class="home-product" style=" margin-left: 86px;">
                <div class="row sm-gutter">
                    @foreach ($product as $sanpham)
                        @if ($sanpham->THE_LOAI === 1)
                            <div class="col l-2-4 m-4 c-6 ">
                                <a href="{{ url('trang-chu/danhmuc/chitiet/' . $sanpham->MA_SP) }}" class="home-product-item">

                                    <img src="{{ asset($sanpham->AVATA_SP) }}" alt="" style="width: 230px; height: 220px;">
                                    <h4 class="home-product-item__name">
                                        {{ $sanpham->TEN_SP }}
                                    </h4>
                                    <div class="home-product-item__price">
                                        {{-- <span class="home-product-item__price-old">2.300.000đ</span> --}}
                                        <span
                                            class="home-product-item__price-current">{{ number_format($sanpham->GIA_SP, 0, ',', '.') }}₫</span>
                                    </div>
                                    <div class="home-product-item__action">
                                        <span class="home-product-item__like home-product-item__like--liked">
                                            <i class="home-product-item__like-icon-empty far fa-heart"></i>
                                            <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                                        </span>
                                        <div class="home-product-item__rating">
                                            <i class="home-product-item__star--gold fas fa-star"></i>
                                            <i class="home-product-item__star--gold fas fa-star"></i>
                                            <i class="home-product-item__star--gold fas fa-star"></i>
                                            <i class="home-product-item__star--gold fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="home-product-item__sold">88 Đã bán</div>
                                    </div>
                                    <div class="home-product-item__origin">
                                        <span class="home-product-item__brand">Whoo</span>
                                        <span class="home-product-item__origin-name">Hàn Quắc</span>
                                    </div>
                                    <div class="home-product-item__favourite">
                                        <i class="fas fa-check "></i>
                                        <span>Yêu thích</span>
                                    </div>
                                    <div class="home-product-item__sale-off">
                                        <span class="home-product-item__sale-off-percent">43%</span>
                                        <span class="home-product-item__sale-off-label">GIẢM</span>
                                    </div>
                                </a>
                            </div>
                            @endif
                            @endforeach
                </div>
            </div>
        </div>
    </div>
  ======
    <!-- Kết Thúc Sản Phẩm Nổi Bật -->


    
    <!-- Sản Phẩm Mới -->
    <div class="row mx-0 mt-4 box border" style="background-color: #ffffff;">
      <div class="d-flex flex-column w-100 pt-4 pb-2">
          <div class="d-flex justify-content-between w-100 px-4 pb-2">
              <h4 style="color: #888">SẢN PHẨM MỚI</h4>
              {{-- <div class="d-flex align-items-center" style="color: #f53d2d">
            <span> Lihat Semua </span>
            <span class="h4 mb-0 ml-2">></span>
          </div> --}}
          </div>
          <div class="home-product" style=" margin-left: 86px;">
              <div class="row sm-gutter">
                  @foreach ($product as $sanpham)
                      @if ($sanpham->THE_LOAI === 0)
                          <div class="col l-2-4 m-4 c-6">
                              <a href="{{ url('trang-chu/danhmuc/chitiet/' . $sanpham->MA_SP) }}" class="home-product-item">

                                  <img src="{{ asset($sanpham->AVATA_SP) }}" alt="" style="width: 230px; height: 220px;">
                                  <h4 class="home-product-item__name">
                                      {{ $sanpham->TEN_SP }}
                                  </h4>
                                  <div class="home-product-item__price">
                                      {{-- <span class="home-product-item__price-old">2.300.000đ</span> --}}
                                      <span
                                          class="home-product-item__price-current">{{ number_format($sanpham->GIA_SP, 0, ',', '.') }}₫</span>
                                  </div>
                                  <div class="home-product-item__action">
                                      <span class="home-product-item__like home-product-item__like--liked">
                                          <i class="home-product-item__like-icon-empty far fa-heart"></i>
                                          <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                                      </span>
                                      <div class="home-product-item__rating">
                                          <i class="home-product-item__star--gold fas fa-star"></i>
                                          <i class="home-product-item__star--gold fas fa-star"></i>
                                          <i class="home-product-item__star--gold fas fa-star"></i>
                                          <i class="home-product-item__star--gold fas fa-star"></i>
                                          <i class="fas fa-star"></i>
                                      </div>
                                      <div class="home-product-item__sold">88 Đã bán</div>
                                  </div>
                                  <div class="home-product-item__origin">
                                      <span class="home-product-item__brand">Whoo</span>
                                      <span class="home-product-item__origin-name">Hàn Quắc</span>
                                  </div>
                                  <div class="home-product-item__favourite">
                                      <i class="fas fa-check "></i>
                                      <span>Yêu thích</span>
                                  </div>
                                  <div class="home-product-item__sale-off">
                                      <span class="home-product-item__sale-off-percent">43%</span>
                                      <span class="home-product-item__sale-off-label">GIẢM</span>
                                  </div>
                              </a>
                          </div>
                          @endif
                          @endforeach
              </div>
          </div>
      </div>
  </div>
   
    <!-- Kết Thúc Sản Phẩm Mới -->
@endsection
