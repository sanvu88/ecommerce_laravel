@extends('backend.layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <div class="container-fluid px-xxl-65 px-xl-20">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Create a new product</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">

                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Information</h5>

                    <div class="row">
                        <div class="col-sm">
                            <form class="needs-validation" novalidate action="{{ route('products.store') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="offset-2 col-md-6 mb-10">
                                        <label>SKU</label>
                                        <input type="text" class="form-control" name="sku" placeholder="Product name" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="offset-2 col-md-6 mb-10">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Product name" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="offset-2 col-md-6 mb-10">
                                        <label>Slug</label>
                                        <input type="text" class="form-control" name="slug" placeholder="Product slug" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="offset-2 col-md-6 mb-10">
                                        <label>Category</label>
                                        <select class="form-control custom-select" name="category_id">
                                            <option value="" selected>--- ROOT ---</option>
                                            @include('backend.includes.categories_options', ['categories' => $allCategory, 'dash' => '--- ', 'selected' => 'NULL'])
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="offset-2 col-md-6 mb-10">
                                        <label>Status</label>
                                        <label>Category</label>
                                        <select class="form-control custom-select" name="status">
                                            @foreach($allStatus as $key => $status)
                                                <option value="{{ $key }}">{{ $status }}</option>
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
                                        <textarea class="form-control" rows="3" name="short_description" placeholder="Write some description about the product"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="offset-2 col-md-6 mb-10">
                                        <label>Description</label>
                                        <div class="tinymce-wrap">
                                            <textarea class="tinymce" rows="3" name="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="offset-2 col-md-6 mb-10">
                                        <label>Price</label>
                                        <input type="number" class="normal" name="price" min="1000" step="1000" value="1000" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="offset-2 col-md-6 mb-10">
                                        <label>Promotion Price</label>
                                        <input type="number" class="normal" name="promotion_price" min="1000" step="1000" value="1000" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="offset-2 col-md-6 mb-10">
                                        <label>Tags</label>
                                        <select id="input_tags" name="tags[]" class="form-control" multiple="multiple">
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-2">
                                    <button class="btn btn-primary" type="submit">Create</button>
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

@section('css')
    <!-- select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
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

    <script src="{{ asset('backend/dist/js/validation-data.js') }}"></script>
@endsection
