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
                            <form class="needs-validation" novalidate action="{{ route('products.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="name">Name</label>
                                        <input id="name" name="name" type="text" class="form-control" placeholder="Product name" value="{{ $product->name }}" required>
                                        <small class="form-text text-muted">*Required</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="slug">Slug</label>
                                        <input id="slug" name="slug" type="text" class="form-control" placeholder="Product slug" value="{{ $product->slug }}" required>
                                        <small class="form-text text-muted">*Required</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="sku">SKU</label>
                                        <input id="sku" name="sku" type="text" class="form-control" placeholder="Product SKU" value="{{ $product->sku }}" required>
                                        <small class="form-text text-muted">*Required</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="categories">Category</label>
                                        <select id="categories" name="categories[]" class="select2" multiple="multiple">
                                            @include('backend.includes.categories_options', ['categories' => $categories, 'dash' => '', 'selected' => $product->categories()->pluck('id')->toArray(), 'type' => 'multiple'])
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-7">
                                        <div class="form-group row">
                                            <div class="col-md">
                                                <label>Short Description</label>
                                                <div class="tinymce-wrap">
                                                    <textarea class="tinymce" rows="3" name="short_description" placeholder="Write some description about the product">{{ $product->short_description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group row">
                                            <div class="col-md">
                                                <label>Thumbnail</label>
                                                <input type="file" name="thumbnail" class="dropify" data-default-file="{{ asset($product->thumbnail) }}" data-max-file-size="1M" />
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md">
                                                <label for="status">Status</label>
                                                <select id="status" name="status" class="form-control custom-select">
                                                    @foreach($allStatus as $key => $status)
                                                        @if($key == $product->status)
                                                            <option value="{{ $key }}" selected>{{ $status }}</option>
                                                        @else
                                                            <option value="{{ $key }}">{{ $status }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <small class="form-text text-muted">*Required</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="price">Price</label>
                                                <div class="input-group">
                                                    <input id="price" name="price" type="number" class="form-control" min="1000" step="1000" value="{{ $product->price }}" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">VNĐ</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="cost">Price Cost</label>
                                                <div class="input-group">
                                                    <input id="cost" name="cost" type="number" class="form-control" min="1000" step="1000" value="{{ $product->cost }}" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">VNĐ</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Long Description</label>
                                        <div class="tinymce-wrap">
                                            <textarea class="tinymce" rows="3" name="long_description">{{ $product->long_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="supplier_id">Supplier</label>
                                        <select id="supplier_id" name="supplier_id" type="text" class="form-control"></select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="brand_id">Brand</label>
                                        <select id="brand_id" name="brand_id" class="form-control"></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="stock">Stock</label>
                                        <input id="stock" name="stock" type="number" class="form-control" min="0" step="1" value="{{ $product->stock }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="weight">Weight</label>
                                        <input id="weight" name="weight" type="number" class="form-control" value="{{ $product->weight }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Weight Unit</label>
                                        <select name="weight_unit" class="form-control">
                                            @foreach($allWeightUnit as $key => $weightUnit)
                                                @if($key == $product->weight_unit)
                                                    <option value="{{ $key }}" selected>{{ $weightUnit }}</option>
                                                @else
                                                    <option value="{{ $key }}">{{ $weightUnit }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label id="length">Length</label>
                                        <input id="length" name="length" type="number" class="form-control" value="{{ $product->length }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="width">Width</label>
                                        <input id="width" name="width" type="number" class="form-control" value="{{ $product->width }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="height">Height</label>
                                        <input id="height" name="height" type="number" class="form-control" value="{{ $product->height }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Dimension Unit</label>
                                        <select name="dimension_unit" class="form-control">
                                            @foreach($allDimensionUnit as $key => $dimensionUnit)
                                                @if($key == $product->dimension_unit)
                                                    <option value="{{ $key }}" selected>{{ $dimensionUnit }}</option>
                                                @else
                                                    <option value="{{ $key }}">{{ $dimensionUnit }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="minimum">Minimum</label>
                                        <input id="minimum" name="minimum" type="number" class="form-control" min="1" step="1" value="{{ $product->minimum }}">
                                        <small class="form-text text-muted">Minimum quantity in one order</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date_available">Date available</label>
                                        <input id="date_available" name="date_available" type="text" class="form-control" value="{{ $product->date_available }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Tags</label>
                                        <select id="input_tags" name="tags[]" class="form-control" multiple="multiple">
                                            @foreach($product->tags as $tag)
                                                <option selected>{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
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

    <!-- Daterangepicker CSS -->
    <link href="{{ asset('backend/vendors/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />

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

    <!-- Daterangepicker JavaScript -->
    <script src="{{ asset('backend/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/daterangepicker/daterangepicker.js') }}"></script>

    <!-- Form Flie Upload Data JavaScript -->
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>

    <script src="{{ asset('backend/dist/js/validation-data.js') }}"></script>
    <script>
      $(function() {
        "use strict";
        $('input[name="date_available"]').daterangepicker({
          singleDatePicker: true,
          showDropdowns: true,
          minYear: 2000,
          "cancelClass": "btn-secondary",
          locale: {
            format: 'YYYY-MM-DD'
          }
        });
      });
    </script>
@endsection
