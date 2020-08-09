@extends('backend.layouts.app')

@section('css')
@endsection

@section('content')
    <!-- Container -->
    <div class="container-fluid mt-xl-50 mt-sm-30 mt-15 px-xxl-65 px-xl-20">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-sm">
                    <div class="card-body">
                        <span class="d-block font-11 font-weight-500 text-dark text-uppercase mb-10">Total orders</span>
                        <div class="d-flex align-items-end justify-content-between">
                            <div>
																<span class="d-block">
																	<span class="display-5 font-weight-400 text-dark">{{ $orderTotal }}</span>
																	<small>orders</small>
																</span>
                            </div>
                            <div>
                                <span class="text-danger font-12 font-weight-600">+{{ $orderIncrease }}%</span>
                            </div>
                        </div>
                        <div class="progress progress-bar-xs mt-30">
                            <div class="progress-bar bg-danger w-{{ $orderIncrease }}" role="progressbar" aria-valuenow="{{ $orderIncrease }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-sm">
                    <div class="card-body">
                        <span class="d-block font-11 font-weight-500 text-dark text-uppercase mb-10">Total Products</span>
                        <div class="d-flex align-items-end justify-content-between">
                            <div>
																<span class="d-block">
																	<span class="display-5 font-weight-400 text-dark">{{ $productTotal }}</span>
																	<small>products</small>
																</span>
                            </div>
                            <div>
                                <span class="text-danger font-12 font-weight-600">+{{ $productIncrease }}%</span>
                            </div>
                        </div>
                        <div class="progress progress-bar-xs mt-30">
                            <div class="progress-bar bg-success w-{{ $productIncrease }}" role="progressbar" aria-valuenow="{{ $productIncrease }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-sm">
                    <div class="card-body">
                        <span class="d-block font-11 font-weight-500 text-dark text-uppercase mb-10">Total Customers</span>
                        <div class="d-flex align-items-end justify-content-between">
                            <div>
																<span class="d-block">
																	<span class="display-5 font-weight-400 text-dark">{{ $customerTotal }}</span>
																	<small>customers</small>
																</span>
                            </div>
                            <div>
                                <span class="text-danger font-12 font-weight-600">+{{ $customerIncrease }}%</span>
                            </div>
                        </div>
                        <div class="progress progress-bar-xs mt-30">
                            <div class="progress-bar bg-warning w-{{ $customerIncrease }}" role="progressbar" aria-valuenow="{{ $customerIncrease }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Container -->

    <!-- Footer -->
    <div class="hk-footer-wrap container-fluid px-xxl-65 px-xl-20">
        <footer class="footer">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <p>Pampered by<a href="https://hencework.com/" class="text-dark" target="_blank">Hencework</a> © 2019</p>
                </div>
                <div class="col-md-6 col-sm-12">
                    <p class="d-inline-block">Follow us</p>
                    <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-facebook"></i></span></a>
                    <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-twitter"></i></span></a>
                    <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-google-plus"></i></span></a>
                </div>
            </div>
        </footer>
    </div>
    <!-- /Footer -->
@endsection

@section('script')
@endsection
