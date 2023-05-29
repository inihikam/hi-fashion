@extends('layouts.success')

@section('title')
    Hi-Fashion - Category
@endsection

@section('content')
    <div class="page-content page-success">
        <div class="section-success" data-aos="zoom-in">
            <div class="container">
                <div class="row align-items-center row-login justify-content-center">
                    <div class="col-lg-6 text-center">
                        <img src="/images/success-register.svg" alt="" class="mb-4" />
                        <h2>Welcome to Hi-Fashion</h2>
                        <p>
                            congratulations you have successfully created an account with
                            us. it's time to shop at Hi-Fashion
                        </p>
                        <div>
                            <a href="/dashboard.html" class="btn btn-primary w-50 mt-4">
                                Dashboard
                            </a>
                            <a href="/index.html" class="btn btn-secondary w-50 mt-2">
                                Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
