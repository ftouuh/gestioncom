@extends('admin.layouts.home')
@section('content')
<div class="main-content">
    <style>
        .add-new {
            display: flex;
            width: 100%;
            justify-content: space-between;
        }

        .add-product {
            border: 0;
            border-radius: 5px;
            padding: 8px 19px;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">


            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                                <h4 class="card-title">{{ __('Liste Produits') }}</h4>
                                <button class="btn-primary add-product">{{ __('Ajouter Un Produit') }}</button>
                                <p class="card-title-desc">

                                </p>

                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">


                                <thead>
                                    <tr>
                                        <th>{{ __('Famille') }}</th>
                                        <th>{{ __('Reference') }}</th>
                                        <th>{{ __('Designation') }}</th>
                                        <th>{{ __('Quantite') }}</th>
                                        <th>{{ __('Prix Achat') }}</th>
                                        <th>{{ __('Prix Unitaire') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $p)
                                    <tr data-product-id="{{ $p->id }}" id="row">
                                        <td>{{ $p->famille }}</td>
                                        <td>{{ $p->reference }}</td>
                                        <td>{{ $p->description }}</td>
                                        <td>{{ $p->quantite }}</td>
                                        <td>{{ $p->Prix_achat }}</td>
                                        <td>{{ $p->Prix_unitaire }}</td>
                                        <td>
                                            <button type="button" class="btn edit-product"
                                                data-product-id="{{ $p->id }}"
                                                data-product-famille="{{ $p->famille }}"
                                                data-product-reference="{{ $p->reference }}"
                                                data-product-description="{{ $p->description }}"
                                                data-product-quantite="{{ $p->quantite }}"
                                                data-product-pa="{{ $p->Prix_achat }}"
                                                data-product-pu="{{ $p->Prix_unitaire }}">
                                                <i class=" ri-edit-2-line "></i>
                                            </button>
                                            <button type="button" class="btn  delete-product"
                                                data-product-id="{{ $p->id }}">
                                                <i class="r ri-delete-bin-3-line"></i>
                                            </button>
                                         
                                  
                                        </td>
                                    </tr>

                                    @endforeach

                                    @include('admin.layouts.components.products.edit-modal')
                                    @include('admin.layouts.components.products.add-modal')
                                    @include('admin.layouts.components.products.confirm-modal')

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
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
