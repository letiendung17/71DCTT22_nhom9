@extends('layouts.user_layout')
@section('content')
@if(count($products) > 0)

<div class="row mx-0 mt-4 border box" style="background-color: #ffffff">
    <div class="d-flex flex-column w-100 pt-4 pb-2">
        <div class="d-flex justify-content-between w-100 px-4 pb-2">
            <h4 style="color: #888">KẾT QUẢ TÌM THẤY</h4>
      
        </div>
        <div class="home-product" style=" margin-left: 86px;">
            <div class="row sm-gutter">
                @foreach ($products as $sanpham)
                   
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
                     
                        @endforeach
            </div>
        </div>
    </div>
</div>


@else
    <h1 class="text-center mt-5 " style="color: #f7472f; margin-top: 100px!important; font-weight: bold;">Không Tìm Thấy Sản Phẩm Phù Hợp! </h1>
@endif


@endsection