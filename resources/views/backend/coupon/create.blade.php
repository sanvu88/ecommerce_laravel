@extends('backend.layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('coupons.index') }}">Coupons</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <div class="container-fluid px-xxl-65 px-xl-20">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Create a new coupon</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">

                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Information</h5>

                    <div class="row">
                        <div class="col-sm">
                            <form class="needs-validation" novalidate action="{{ route('coupons.store') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="offset-2 col-md-6">
                                        <label for="code">Code</label>
                                        <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-2 col-md-6">
                                        <label for="type">Type</label>
                                        <select id="type" type="text" class="form-control custom-select" name="type">
                                            @foreach($allType as $key => $value)
                                                <option value="{{ $value }}">{{ $key }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-2 col-md-6">
                                        <label for="value">Value</label>
                                        <input id="value" type="text" class="form-control" name="value" value="{{ old('value') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-2 col-md-6">
                                        <label for="status">Status</label>
                                        <select id="status" type="text" class="form-control custom-select" name="status">
                                            @foreach($allStatus as $key => $name)
                                                <option value="{{ $key }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-2 col-md-6">
                                        <button class="btn btn-primary" type="submit">CREATE</button>
                                        <a href="{{ route('coupons.index') }}" class="btn btn-light">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>

            </div>
        </div>
        <!-- /Row -->
    </div>
@endsection

