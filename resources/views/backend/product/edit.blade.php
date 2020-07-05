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
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <div class="form-row">
                                    <div class="col-md-6 mb-10">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Product name" value="{{ $product->name }}" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-10">
                                        <label>Slug</label>
                                        <input type="text" class="form-control" name="slug" placeholder="Product slug" value="{{ $product->slug }}" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-10">
                                        <label>SKU</label>
                                        <input type="text" class="form-control" name="sku" placeholder="Product SKU" value="{{ $product->sku }}" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-10">
                                        <label>Category</label>
                                        <select class="form-control custom-select" name="category_id">
                                            <option value="0" selected>--- ROOT ---</option>
                                            @include('backend.includes.categories_options', ['categories' => $allCategory, 'dash' => ' --- ', 'selected' => $product->category_id])
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-8 mb-10">
                                        <div class="form-row">
                                            <div class="col-md">
                                                <label>Short Description</label>
                                                <div class="tinymce-wrap">
                                                    <textarea class="tinymce" rows="3" name="short_description" placeholder="Write some description about the product">{{ $product->short_description }}</textarea>
                                                </div>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <div class="form-row">
                                            <div class="col-md">
                                                <input type="file" name="thumbnail" class="dropify" data-default-file="{{ asset($product->thumbnail) }}" />
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="col-md">
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
                                            <div class="col-md">
                                                <label>Price</label>
                                                <input type="number" class="normal" name="price" min="1000" step="1000" value="{{ $product->price }}" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md">
                                                <label>Promotion Price</label>
                                                <input type="number" class="normal" name="promotion_price" min="1000" step="1000" value="{{ $product->promotion_price }}" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-10">
                                        <label>Long Description</label>
                                        <div class="tinymce-wrap">
                                            <textarea class="tinymce" rows="3" name="long_description">{{ $product->long_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-10">
                                        <label>Manufacturer</label>
                                        <input type="text" class="form-control" name="manufacturer" placeholder="Product Manufacturer" value="{{ $product->manufacturer }}" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-10">
                                        <label>Amount</label>
                                        <input type="number" class="normal" name="amount" min="0" step="1" value="{{ $product->amount }}" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-10">
                                        <label>Tags</label>
                                        <select id="input_tags" name="tags[]" class="form-control" multiple="multiple">
                                            @foreach($product->tags as $tag)
                                                <option selected>{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('products.index') }}" class="btn btn-light">CANCEL</a>
                                    <button class="btn btn-primary" type="submit">UPDATE</button>
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

@section('css')
    <!-- select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Dropzone CSS -->
    <link href="{{ asset('backend/vendors/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Bootstrap Dropify CSS -->
    <link href="{{ asset('backend/vendors/dropify/dist/css/dropify.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('script')
    <!-- Select2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{ asset('backend/dist/js/select2-data.js') }}"></script>

    <!-- Bootstrap Input spinner JavaScript -->
    <script src="{{ asset('backend/vendors/bootstrap-input-spinner/src/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ asset('backend/dist/js/inputspinner-data.js') }}"></script>

    <!-- Tinymce JavaScript -->
    <script src="{{ asset('backend/vendors/tinymce/tinymce.min.js') }}"></script>

    <!-- Tinymce Wysuhtml5 Init JavaScript -->
    <script src="{{ asset('backend/dist/js/tinymce-data.js') }}"></script>

    <!-- Dropify JavaScript -->
    <script src="{{ asset('backend/vendors/dropify/dist/js/dropify.min.js') }}"></script>

    <!-- Form Flie Upload Data JavaScript -->
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>

    <script src="{{ asset('backend/dist/js/validation-data.js') }}"></script>
@endsection
