@extends('backend.layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <div class="container-fluid px-xxl-65 px-xl-20">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Edit the product</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">

                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Information</h5>

                    <div class="row">
                        <div class="col-sm">
                            <form class="needs-validation" novalidate action="{{ route('products.update', ['product' => $product->id]) }}" method="post">
                                @method('PUT')
                                {{ csrf_field() }}
                                <input name="id" type="hidden" value="{{ $product->id }}">
                                <div class="form-row">
                                    <div class="offset-2 col-md-6 mb-10">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Product name" value="{{ $product->name }}" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="offset-2 col-md-6 mb-10">
                                        <label>Slug</label>
                                        <input type="text" class="form-control" name="slug" placeholder="Product slug" value="{{ $product->slug }}" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="offset-2 col-md-6 mb-10">
                                        <label>Category</label>
                                        <select class="form-control custom-select" name="category_id">
                                            <option value="0" selected>--- ROOT ---</option>
                                            @include('backend.includes.categories_options', ['categories' => $allCategory, 'dash' => ' --- ', 'selected' => $product->category_id])
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="offset-2 col-md-6 mb-10">
                                        <label>Status</label>
                                        <select class="form-control custom-select" name="status">
                                            @foreach($allStatus as $key => $status)
                                                @if($key === $product->status)
                                                    <option value="{{ $key }}" selected>{{ $status }}</option>
                                                @else
                                                    <option value="{{ $key }}">{{ $status }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="offset-2 col-md-6 mb-10">
                                        <label>Short Description</label>
                                        <textarea class="form-control" rows="3" name="short_description" placeholder="Write some description about the product">{{ $product->short_description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="offset-2 col-md-6 mb-10">
                                        <label>Description</label>
                                        <div class="tinymce-wrap">
                                            <textarea class="tinymce" rows="3" name="description">{{ $product->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="offset-2 col-md-6 mb-10">
                                        <label>Price</label>
                                        <input type="number" class="normal" name="price" min="1000" step="1000" value="{{ $product->price }}" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="offset-2 col-md-6 mb-10">
                                        <label>Promotion Price</label>
                                        <input type="number" class="normal" name="promotion_price" min="1000" step="1000" value="{{ $product->promotion_price }}" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-2">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                    <a href="{{ route('products.index') }}" class="btn btn-light">Cancel</a>
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

@section('script')
    <!-- Bootstrap Input spinner JavaScript -->
    <script src="{{ asset('backend/vendors/bootstrap-input-spinner/src/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ asset('backend/dist/js/inputspinner-data.js') }}"></script>

    <!-- Tinymce JavaScript -->
    <script src="{{ asset('backend/vendors/tinymce/tinymce.min.js') }}"></script>

    <!-- Tinymce Wysuhtml5 Init JavaScript -->
    <script src="{{ asset('backend/dist/js/tinymce-data.js') }}"></script>

    <script src="{{ asset('backend/dist/js/validation-data.js') }}"></script>
@endsection