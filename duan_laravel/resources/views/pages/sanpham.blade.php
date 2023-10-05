
@extends('pages.danhmuc')
@section('product')


 <div class="row sm-gutter " >
                            <!-- Product item -->
                            @foreach($sanpham as $product)
                            <div class="col l-2-4 m-4 c-6">
                                <a href="{{url('trang-chu/danhmuc/chitiet/'.$product->MA_SP)}}" class="home-product-item">
                                    
                                        <img src="{{asset($product->AVATA_SP)}}" alt="" style="width: 190px; height: 180px;">
                                    
                                    <h4 class="home-product-item__name">
                                      {{$product->TEN_SP}}
                                    </h4>
                                    <div class="home-product-item__price">
                                        <span class="home-product-item__price-old">2.300.000đ</span>
                                        <span class="home-product-item__price-current">{{ number_format($product->GIA_SP, 0, ',', '.') }}₫</span>
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

@endsection