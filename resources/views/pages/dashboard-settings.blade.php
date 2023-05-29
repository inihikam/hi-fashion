@extends('layouts.dashboard')

@section('title')
    Hi-Fashion - Dashboard Settings
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Store Settings</h2>
                <p class="dashboard-subtitle">Personalize your store!</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('dashboard-account-redirect', 'dashboard-setting') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Store Name</label>
                                                <input type="text" class="form-control" name="store_name"
                                                    value="{{ $user->store_name }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Store Category</label>
                                                <select name="categories_id" class="form-control">
                                                    <option value="{{ $user->categories_id }}">Not Changed</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Store</label>
                                                <p class="text-muted">
                                                    Do you want to open a store?
                                                </p>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="store_status" id="openStoreTrue"
                                                        class="custom-control-input" value="1"
                                                        {{ $user->store_status == 1 ? 'checked' : '' }} />
                                                    <label for="openStoreTrue" class="custom-control-label">
                                                        Yes, Sure
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="store_status" id="openStoreFalse"
                                                        class="custom-control-input" value="0"
                                                        {{ $user->store_status == 0 || $user->store_status == null ? 'checked' : '' }} />
                                                    <label for="openStoreFalse" class="custom-control-label">
                                                        No, Thanks
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-primary px-5">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
