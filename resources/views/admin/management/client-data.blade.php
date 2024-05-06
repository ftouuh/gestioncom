@extends('admin.layouts.home')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Client List</h4>
                            <button class="btn-primary add-client">{{ __('Add New Client') }}</button>

                            <p class="card-title-desc">
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>{{ __('Nom') }}</th>
                                        <th>{{ __('Prenom') }}</th>
                                        <th>{{ __('Telephone') }}</th>
                                        <th>{{ __('Societe') }}</th>
                                        <th>{{ __('ICE') }}</th>
                                        <th>{{ __('address') }}</th>
                                        <th>{{ __('Email') }}</th>      
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($clients as $c)
                                        <tr data-client-id="{{$c->id}}">
                                            <td>{{ $c->nom }}</td>
                                            <td>{{ $c->prenom }}</td>
                                            <td>{{ $c->telephone }}</td>
                                            <td>{{ $c->societe }}</td>
                                            <td>{{ $c->ice }}</td>
                                            <td>{{ $c->address }}</td>
                                            <td>{{ $c->email }}</td>
        

                                            <td>
                                            <button type="button" class="btn edit-client"
                                                data-client-id="{{ $c->id }}"
                                                data-client-nom="{{ $c->nom }}"
                                                data-client-prenom="{{ $c->prenom }}"
                                                data-client-telephone="{{ $c->telephone }}"
                                                data-client-address="{{ $c->address }}"
                                                data-client-email="{{ $c->email }}">
                                                <i class=" ri-edit-2-line "></i>
                                            </button>
                                            <button type="button" class="btn  delete-client"
                                                data-client-id="{{ $c->id }}">
                                                <i class="r ri-delete-bin-3-line"></i>
                                            </button>

                                        </td>
                                        </tr>





                                    @endforeach
                                    @include('admin.layouts.components.clients.edit-modal')
                                    @include('admin.layouts.components.clients.add-modal')
                                    @include('admin.layouts.components.clients.confirm-modal')
                                    @include('admin.layouts.components.clients.show-modal')
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


<script src="assets/libs/jquery/jquery.min.js"></script>