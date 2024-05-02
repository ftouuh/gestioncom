@extends('admin.layouts.home')
@section('content')
<div class="main-content">
    <style>
        .add-new {
            display: flex;
            width: 100%;
            justify-content: space-between;
        }

        .add-user {
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
                            <div class="add-new">
                                <h4 class="card-title">{{ __('Products List') }}</h4>
                                <button class="btn-primary add-user">{{ __('Add New Product') }}</button>
                                <p class="card-title-desc">

                                </p>
                            </div>

                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">


                                <thead>
                                    <tr>
                                        <th>{{ __('Famille') }}</th>
                                        <th>{{ __('Reference') }}</th>
                                        <th>{{ __('Description') }}</th>
                                        <th>{{ __('Quantite') }}</th>
                                        <th>{{ __('Prix Achat') }}</th>
                                        <th>{{ __('Prix Unitaire') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $p)
                                    <tr data-user-id="{{ $user->deleteId }}" id="row">
                                        <td>{{ $p->famille }}</td>
                                        <td>{{ $p->reference }}</td>
                                        <td>{{ $p->description }}</td>
                                        <td>{{ $p->quantite }}</td>
                                        <td>{{ $p->Prix_achat }}</td>
                                        <td>{{ $p->Prix_unitaire }}</td>
                                        <td>
                                            <button type="button" class="btn  edit-user"
                                                data-user-id="{{ $p->id }}"
                                                data-user-name="{{ $p->famille }}"
                                                data-user-username="{{ $user->reference }}"
                                                data-user-phone="{{ $user->description }}">
                                                <i class=" ri-edit-2-line "></i>
                                            </button>
                                            <button type="button" class="btn  delete-user"
                                                data-user-id="{{ $p->id }}">
                                                <i class="r ri-delete-bin-3-line"></i>
                                            </button>
                                            <button type="button" class="btn  show-user"
                                            data-user-id="{{ $p->id }}">
                                            <i class=" ri-file-info-line
                                            "></i>
                                            </button>
                                        </td>
                                    </tr>

                                    @endforeach

                                    @include('admin.layouts.components.users.edit-modal')
                                    @include('admin.layouts.components.users.add-modal')
                                    @include('admin.layouts.components.users.confirm-modal')
                                    @include('admin.layouts.components.users.show-modal')

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
                    <script>document.write(new Date().getFullYear())</script> © elklie.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        {{ __('crafted_with_love') }}
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>

<!-- Modal for editing user -->


@endsection
