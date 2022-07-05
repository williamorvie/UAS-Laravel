@extends('layouts.app')

@section('title', 'Shop')
@section('content')

<!-- start page content -->
<div class="container">
        <div class="row" style="margin-top: 70px" >
            <!-- start filter section -->
            <div class="col-md-2" style="margin-top:1em">
                <h4 class="filter-header">
                    By Category
                </h4>
                <ul class="filter-ul">
                    @foreach ($categories as $category)
                        <li><a class="text-center {{ $category->name == $categoryName ? 'active-cat' : '' }}" href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
                <h4 class="filter-header">
                    By Tag
                </h4>
                <ul class="filter-ul">
                    @foreach ($tags as $tag)
                        <li><a class="text-center {{ $tag->name == $tagName ? 'active-cat' : '' }}" href="{{ route('shop.index', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <!-- end filter section -->
            <!-- start products section -->
            <div class="col-md-8 offset-md-1">
                <div class="head row">
                    <div class="col-md-6">
                        <h2 class="content-head">
                            {{ $categoryName }}
                        </h2>
                    </div>
                </div>
                <!-- start products row -->
                <div class="row">
                    @foreach ($products as $product)
                        <!-- start single product -->
                        <div class="col-md-6 col-sm-12 col-lg-4 product">
                            <a href="{{ route('shop.show', $product->slug) }}" class="custom-card">
                                <div class="card view overlay zoom">
                                    <img src="{{ productImage($product->image) }}" class="card-img-top img-fluid" alt="..." height="200px" width="200px">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}<span class="float-right">$ {{ format($product->price) }}</span></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single product -->
                    @endforeach
                </div>
                <div class="text-center">
                    {{ $products->appends(request()->input())->links() }}
                </div>
                <!-- end products row -->
            </div>
            <!-- end products section -->
        </div>
    </div>
    <!-- end page content -->

@endsection
