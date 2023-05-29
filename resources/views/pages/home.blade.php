@extends('layouts.app')

@section('title')
    Hi-Fashion - Home
@endsection

@section('content')
    <div class="page-content page-home">
        <section class="store-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" data-aos="zoom-in">
                        <div id="storeBanner" class="carousel" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="/images/banner.jpg" alt="Banner Image" class="d-block w-100" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="store-categories">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>New Categories</h5>
                    </div>
                </div>
                <div class="row">
                    @php
                        $card_id_category = 0;
                    @endphp
                    @forelse ($categories as $category)
                        <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up"
                            data-aos-delay="{{ $card_id_category += 100 }}">
                            <a href="{{ route('categories-detail', $category->slug) }}"
                                class="component-categories d-block">
                                <div class="categories-image">
                                    <img src="{{ Storage::url($category->photo) }}" alt="" class="w-100" />
                                </div>
                                <p class="categories-text">{{ $category->name }}</p>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center y-5" data-aos="fade-up" data-aos-delay="100">
                            Empty Categories
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        <section class="store-new-arrival">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>New Arrivals</h5>
                    </div>
                </div>
                <div class="row">
                    @php
                        $card_id_product = 0;
                    @endphp
                    @forelse ($products as $product)
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up"
                            data-aos-delay="{{ $card_id_product += 100 }}">
                            <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                                <div class="product-thumbnail">
                                    <div class="product-image"
                                        style="
                                            @if ($product->galleries) background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                                            @else background-image: #c0c0c0 @endif">
                                    </div>
                                </div>
                                <div class="product-text">{{ $product->name }}</div>
                                <div class="product-price">${{ $product->price }}</div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                            Products Empty
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection
