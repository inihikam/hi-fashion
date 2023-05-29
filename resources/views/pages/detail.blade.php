@extends('layouts.app')

@section('title')
    Hi-Fashion - Detail Product
@endsection

@section('content')
    <div class="page-content page-details">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Details Product</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-gallery mb-5" id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8" data-aos="zoom-in">
                        <transition name="slide-fade" mode="out-in">
                            <img :src="pictures[activePict].url" :key="pictures[activePict].id" class="w-100 main-image"
                                alt="" />
                        </transition>
                    </div>
                    <div class="col-lg-2" data-aos="zoom-in">
                        <div class="row">
                            <div class="col-3 col-lg-12 mt-2 mt-lg-8" v-for="(picture, index) in pictures"
                                :key="picture.id" data-aos-delay="100">
                                <a href="#" @click="changeActive(index)">
                                    <img :src="picture.url" class="w-100 thumbnail-image"
                                        :class="{ active: index == activePict }" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="store-details-container" data-aos="fade-up">
            <section class="store-heading mt-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <h1>{{ $product->name }}</h1>
                            <div class="owner">By {{ $product->user->store_name }}</div>
                            <div class="price">${{ number_format($product->price) }}</div>
                        </div>
                        <div class="col-lg-2">
                            @auth
                                <form action="{{ route('add-detail', $product->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn btn-primary px-4 text-white btn-block mb-3">Add to
                                        Cart</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary px-4 text-white btn-block mb-3">Sign In to
                                    Buy</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </section>
            <section class="store-description">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
            </section>
            <section class="store-review">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8 mt-3 mb-3">
                            <h5>Review Products</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <ul class="list-unstyled">
                                <li class="media">
                                    <img src="/images/review1.jpg" alt=""
                                        class="mr-3 rounded-circle review-profile" />
                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">Joanna Volkova</h5>
                                        My grandson really likes it because Stephen Curry is his
                                        idol. He always wears it when playing basketball to
                                        traveling.
                                    </div>
                                </li>
                                <li class="media">
                                    <img src="/images/review2.jpg" alt=""
                                        class="mr-3 rounded-circle review-profile" />
                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">Anna Zevanya</h5>
                                        Very cushioned and comfortable to use in various
                                        conditions. I have no regrets when I bought it. The best
                                        shoes I own
                                    </div>
                                </li>
                                <li class="media">
                                    <img src="/images/review3.jpg" alt=""
                                        class="mr-3 rounded-circle review-profile" />
                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">Vera Michelle</h5>
                                        My boyfriend loves them so much. I gave them to him for
                                        his birthday. He's so happy.
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
        var gallery = new Vue({
            el: "#gallery",
            mounted() {
                AOS.init();
            },
            data: {
                activePict: 0,
                pictures: [
                    @foreach ($product->galleries as $gallery)
                        {
                            id: {{ $gallery->id }},
                            url: "{{ Storage::url($gallery->photos) }}",
                        },
                    @endforeach
                ],
            },
            methods: {
                changeActive(id) {
                    this.activePict = id;
                },
            },
        });
    </script>
@endpush
