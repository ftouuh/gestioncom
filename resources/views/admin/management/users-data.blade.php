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
                                <h4 class="card-title">{{ __('Liste Utilisateurs') }}</h4>
                                <button class="btn-primary add-user">{{ __('Ajouter Un Utilisateur') }}</button>
                                <p class="card-title-desc">

                                </p>

                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                
                                <thead>
                                    <tr>
                                        <th>{{ __('Nom') }}</th>
                                        <th>{{ __('Username') }}</th>
                                        <th>{{ __('Numero Telephone') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr data-user-id="{{ $user->id }}" id="row">
                                        <td>{{ $user->nom }} {{ $user->prenom }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->phoneNumber }}</td>
                                        <td>
                                            <button type="button" class="btn edit-user"
                                                data-user-id="{{ $user->id }}"
                                                data-user-nom="{{ $user->nom }}"
                                                data-user-prenom="{{ $user->prenom }}"
                                                data-username="{{ $user->username }}"
                                                data-user-phone="{{ $user->phoneNumber }}">
                                                <i class=" ri-edit-2-line "></i>
                                            </button>
                                            <button type="button" class="btn  delete-user"
                                                data-user-id="{{ $user->id }}">
                                                <i class="r ri-delete-bin-3-line"></i>
                                            </button>
         
  
                                        </td>
                                    </tr>
                                    @endforeach

                                    @include('admin.layouts.components.users.edit-modal')
                                    @include('admin.layouts.components.users.add-modal')
                                    @include('admin.layouts.components.users.confirm-modal')

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

<!-- Modal for editing user -->


@endsection
