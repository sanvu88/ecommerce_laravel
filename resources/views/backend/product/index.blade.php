@extends('backend.layouts.app')

@section('css')
    <!-- Data Table CSS -->
    <link href="{{ asset('backend/vendors/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <div class="container-fluid px-xxl-65 px-xl-20">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>List Product</h4>
            <div class="d-flex">
                <a href="{{ route('products.create') }}" class="btn btn-outline-success"><i class="ion ion-md-add-circle-outline"></i> Create</a>
            </div>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">

                <section class="hk-sec-wrapper">
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap table-responsive">
                                <table class="table table-hover w-100 display pb-30">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Thumbnail</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $index => $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td><img src="{{ $product->thumbnail }}" class="img-fluid img-thumbnail" height="100" width="100" alt="img"></td>
                                            <td>{{ $product->status_name }}</td>
                                            <td>{{ number_format($product->price, 0) }} VNĐ</td>
                                            <td>{{ $product->created_at }}</td>
                                            <td>{{ $product->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="mr-25"> <i class="icon-pencil"></i> </a>
                                                <a href="#" data-toggle="modal" data-target="#delete_modal_{{ $index }}"> <i class="icon-trash txt-danger"></i> </a>
                                                @include('backend.includes.modal_delete_confirm', ['index' => $index, 'item' => $product, 'type' => 'product'])
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if(!count($products))
                                        <td colspan="9" class="text-center"><h3><i class="linea-icon linea-basic" data-icon="f"></i></h3> No Data</td>
                                    @endif
                                    </tbody>
                                    <tfoot class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Thumbnail</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="float-left">
                                {!! $products->total() !!} products
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="float-right">
                                {!! $products->render() !!}
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
        <!-- /Row -->
    </div>
@endsection

@section('script')
    <!-- Data Table JavaScript -->
    <script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
{{--    <script src="{{ asset('backend/dist/js/dataTables-data.js') }}"></script>--}}
@endsection

