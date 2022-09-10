@extends('layouts.layout')

@section('title', 'Fashi | Template')


@section('content')
    <div class="col-lg-9 order-1 order-lg-2">
        <div class="product-show-option">
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <div class="select-option">
                        <select class="sorting">
                            <option value="">Default Sorting</option>
                        </select>
                        <select class="p-show">
                            <option value="">Show:</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 text-right">
                    <p>Show 01- 09 Of 36 Product</p>
                </div>
            </div>
        </div>
        <div class="product-list">
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-4 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="/assets/front/img/products/product-1.jpg" alt="">
{{--                            <img src="{{ route('products.single', ['slug' => $product->slug]) }}" alt="">--}}
                            <div class="sale pp-sale">Sale</div>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="{{  route('products.single', ['slug' => $product->slug]) }}">
                                <h5>{{ $product->title }}</h5>
                            </a>
                            <div class="product-price">
                                {{ $product->price }}
                                <span>$35.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
{{--        <div class="loading-more">--}}
{{--            <i class="icon_loading"></i>--}}
{{--            <a href="#">--}}
{{--                Loading More--}}
{{--            </a>--}}
{{--        </div>--}}
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="Page navigation">
                    {{ $products->links('vendor.pagination.bootstrap-4') }}
                </nav>
            </div><!-- end col -->
        </div><!-- end row -->
    </div>
@endsection
