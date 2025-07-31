@extends('user.layouts.app')
@push('styes')
    
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Creative AI</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>                            
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                <i class="iconoir-dollar-circle fs-4"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 text-truncate">
                                <p class="text-dark mb-0 fw-semibold fs-14">Total Revenue</p>
                                <p class="mb-0 text-truncate text-muted"><span class="text-success">8.5%</span>
                                    Increase from last month</p>
                            </div><!--end media-body-->
                        </div><!--end media-->
                        <div class="row d-flex justify-content-center">
                            <div class="col">                                        
                                <h3 class="mt-2 mb-0 fw-bold">$8365.00</h3>
                            </div>
                            <!--end col-->
                            <div class="col align-self-center">
                                <img src="assets/images/extra/line-chart.png" alt="" class="img-fluid">
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0 bg-info-subtle text-info thumb-md rounded-circle">
                                <i class="iconoir-cart fs-4"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 text-truncate">
                                <p class="text-dark mb-0 fw-semibold fs-14">New Order</p>
                                <p class="mb-0 text-truncate text-muted"><span class="text-success">1.7%</span>
                                    Increase from last month</p>
                            </div><!--end media-body-->
                        </div><!--end media-->
                        <div class="row d-flex justify-content-center">
                            <div class="col">                                        
                                <h3 class="mt-2 mb-0 fw-bold">865</h3>
                            </div>
                            <!--end col-->
                            <div class="col align-self-center">
                                <img src="assets/images/extra/bar.png" alt="" class="img-fluid">
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0 bg-warning-subtle text-warning thumb-md rounded-circle">
                                <i class="iconoir-percentage-circle fs-4"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 text-truncate">
                                <p class="text-dark mb-0 fw-semibold fs-14">Sessions</p>
                                <p class="mb-0 text-truncate text-muted"><span class="text-danger">0.7%</span>
                                    Decrease from last month</p>
                            </div><!--end media-body-->
                        </div><!--end media-->
                        <div class="row d-flex justify-content-center">
                            <div class="col">                                        
                                <h3 class="mt-2 mb-0 fw-bold">155</h3>
                            </div>
                            <!--end col-->
                            <div class="col align-self-center">
                                <img src="assets/images/extra/donut.png" alt="" class="img-fluid">
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0 bg-danger-subtle text-danger thumb-md rounded-circle">
                                <i class="iconoir-hexagon-dice fs-4"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 text-truncate">
                                <p class="text-dark mb-0 fw-semibold fs-14">Avg. Order value</p>
                                <p class="mb-0 text-truncate text-muted"><span class="text-success">2.7%</span>
                                    Increase from last month</p>
                            </div><!--end media-body-->
                        </div><!--end media-->
                        <div class="row d-flex justify-content-center">
                            <div class="col">                                        
                                <h3 class="mt-2 mb-0 fw-bold">$12550.00</h3>
                            </div>
                            <!--end col-->
                            <div class="col align-self-center">
                                <img src="assets/images/extra/tree.png" alt="" class="img-fluid">
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->                    
        </div>
    </div>
@endsection

@push('script')
    
@endpush