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
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Orders</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <div class="container-fluid px-xxl-65 px-xl-20">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>List of orders</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">

                <section class="hk-sec-wrapper">
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <table id="datable_1" class="table table-hover w-100 display pb-30">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Subtotal</th>
                                        <th>Shipping</th>
                                        <th>Discount</th>
                                        <th>PM method</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $index => $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->subtotal }}</td>
                                            <td>{{ $order->shipping }}</td>
                                            <td>{{ $order->discount }}</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>
                                                <a href="#" class="mr-25"> <i class="icon-pencil"></i> </a>
                                                <a href="#" data-toggle="modal" data-target="#delete_modal_{{ $index }}"> <i class="icon-trash txt-danger"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if(!count($orders))
                                        <td colspan="8" class="text-center"><h3><i class="linea-icon linea-basic" data-icon="f"></i></h3> No Data</td>
                                    @endif
                                    </tbody>
                                    <tfoot class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Subtotal</th>
                                        <th>Shipping</th>
                                        <th>Discount</th>
                                        <th>PM method</th>
                                        <th>Status</th>
                                        <th>Created at</th>
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
                                {!! $orders->total() !!} orders
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="float-right">
                                {!! $orders->render() !!}
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
    <script src="{{ asset('backend/dist/js/dataTables-data.js') }}"></script>
@endsection
