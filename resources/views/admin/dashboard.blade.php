@extends('admin.layouts.home')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">INTERFACE</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">NB NORTE</a></li>
                                <li class="breadcrumb-item active"></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Total Ventes</p>
                                    <h4 class="mb-2">{{$totalQuantity}}</h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="ri-shopping-cart-2-line font-size-24"></i>  
                                    </span>
                                </div>
                            </div>                                            
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Factures Aujourd'hui</p>
                                    <h4 class="mb-2">{{$todayfacs}}</h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="mdi mdi-currency-usd font-size-24"></i>  
                                    </span>
                                </div>
                            </div>                                              
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Total Clients</p>
                                    <h4 class="mb-2">{{$totalclient}}</h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="ri-user-3-line font-size-24"></i>  
                                    </span>
                                </div>
                            </div>                                              
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Total Produits</p>
                                    <h4 class="mb-2">{{$totalproduit}}</h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="mdi mdi-currency-btc font-size-24"></i>  
                                    </span>
                                </div>
                            </div>                                              
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

            <div class="row">
                <div class="col-xl-6">

                    <div class="card">
                        <div class="card-body pb-0">
                            
                            <h4 class="card-title mb-4">Graphics</h4>

                            <div class="text-center pt-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="d-inline-flex">
                                            <h5 class="me-2"></h5>
                                            <div class="text-success font-size-12">
                                                <i class="mdi mdi-menu-up font-size-14"> </i>
                                            </div>
                                        </div>
                                        <p class="text-muted text-truncate mb-0"></p>
                                    </div><!-- end col -->
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="d-inline-flex">
                                            <h5 class="me-2"></h5>
                                            <div class="text-success font-size-12">
                                                <i class="mdi mdi-menu-up font-size-14"> </i>
                                            </div>
                                        </div>
                                        <p class="text-muted text-truncate mb-0"></p>
                                    </div><!-- end col -->
                                    <div class="col-sm-4">
                                        <div class="d-inline-flex">
                                            <h5 class="me-2"></h5>
                                            <div class="text-success font-size-12">
                                                <i class="mdi mdi-menu-up font-size-14"> </i>
                                            </div>
                                        </div>
                                        <p class="text-muted text-truncate mb-0"></p>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div>
                        </div>
                        <div class="card-body py-0 px-2">
                            <div id="area_chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body pb-0">
                            
                            <h4 class="card-title mb-4">Graphics</h4>

                            <div class="text-center pt-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div>
                                            <h5></h5>
                                            <p class="text-muted text-truncate mb-0"></p>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div>
                                            <h5></h5>
                                            <p class="text-muted text-truncate mb-0"></p>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-sm-4">
                                        <div>
                                            <h5></h5>
                                            <p class="text-muted text-truncate mb-0"></p>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div>
                        </div>
                        <div class="card-body py-0 px-2">
                            <div id="column_line_chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            
            <!-- end row -->
        </div>
        
    </div>
    <!-- End Page-content -->
   
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> 
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        NB NORTE
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
</div>
@endsection