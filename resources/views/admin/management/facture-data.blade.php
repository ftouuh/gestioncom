@extends('admin.layouts.home')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Factures List</h4>
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
                                        <tr data-client-id="{{$client->id}}">
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



                                    @include('admin.layouts.components.factures.edit-modal')
                                    @include('admin.layouts.components.factures.add-modal')
                                    @include('admin.layouts.components.factures.confirm-modal')
                                    @include('admin.layouts.components.factures.show-modal')
                                    @endforeach
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

<!-- Modal for editing mechanic -->
<div class="modal fade" id="editMechanicModal" tabindex="-1" aria-labelledby="editMechanicModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editMechanicModalLabel">Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

                  <form id="editMechanicForm">
                    <!-- Form fields -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
                    </div>
                  </form>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="submitEditMechanicForm">Save changes</button>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
{{-- <script>
    $(document).ready(function() {
        // Handle click event for edit mechanic button
        $('.edit-mechanic').click(function() {
            // Get the mechanic ID from data attribute
            var mechanicId = $(this).data('mechanic-id');

            // Perform AJAX request to fetch mechanic details
            $.ajax({
                url: '/mechanics/' + mechanicId + '/edit',
                type: 'GET',
                success: function(response) {
                    // Populate the modal body with the fetched data
                    $('#editMechanicModal .modal-body').html(response);

                    // Show the modal
                    $('#editMechanicModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script> --}}
@endpush
