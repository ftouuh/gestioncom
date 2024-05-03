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

                            <h4 class="card-title">Factures List</h4>
<<<<<<< HEAD
                            <button class="btn-primary add-product">{{ __('Add New Product') }}</button>
=======
                            <button class="btn-primary add-facture">{{ __('Add New Facture') }}</button>
                                <p class="card-title-desc">
>>>>>>> 4e60c59772437af2c525e25eb11db60e963e73db
                            <p class="card-title-desc">
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>{{ __('Client') }}</th>
                                        <th>{{ __('Date Commande') }}</th>
                                        <th>{{ __('Versement') }}</th>
                                        <th>{{ __('Reste') }}</th>
                                        <th>{{ __('Date Saisi') }}</th>
                                        <th>{{ __('TOTAL TTC') }}</th>
                                        <th>{{ __('TVA') }}</th>
                                        <th>{{ __('TOTAL HT') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($factures as $f)
                                        <tr data-client-id="{{$f->id}}">
                                            <td>{{ $f->nom_client }} {{ $f->prenom_client }}</td>
                                            <td>{{ $f->date_commande }}</td>
                                            <td>{{ $f->versement }}</td>
                                            <td>{{ $f->reste }}</td>
                                            <td>{{ $f->saisi_le }}</td>
                                            <td>{{ $f->total_TTC }}</td>
                                            <td>{{ $f->TVA }}</td>
                                            <td>{{ $f->total_HT }}</td>

                                            <td>
                                                <button type="button" class="btn btn-primary edit-client"
                                                data-client-id="{{$f->id}}"
                                                data-client-name="{{$f->name}}"
                                                data-client-email="{{$f->email}}"
                                                data-client-address="{{$f->address}}"
                                                data-client-phone="{{$f->phoneNumber}}"
                                            >
                                            {{ __('Edit') }}
                                            </button>
                                            </td>
                                        </tr>


<<<<<<< HEAD
                                        @endforeach
=======
                                    @endforeach
>>>>>>> 4e60c59772437af2c525e25eb11db60e963e73db
                                    @include('admin.layouts.components.factures.edit-modal')
                                    @include('admin.layouts.components.factures.add-modal')
                                    @include('admin.layouts.components.factures.confirm-modal')
                                    @include('admin.layouts.components.factures.show-modal')
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © elklie.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Crafted with <i class="mdi mdi-heart text-danger"></i> by reda-elklie
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<<<<<<< HEAD
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
=======

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
>>>>>>> 4e60c59772437af2c525e25eb11db60e963e73db
