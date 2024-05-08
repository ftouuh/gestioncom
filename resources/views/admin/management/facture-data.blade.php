@extends('admin.layouts.home')
@section('content')
<div class="main-content">
<style>
        .add-new {
            display: flex;
            width: 100%;
            justify-content: space-between;
        }

        .add-facture {
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

                            <h4 class="card-title">Liste Factures</h4>
                            <button class="btn-primary add-facture">{{ __('Ajouter une Facture') }}</button>
                                <p class="card-title-desc">
                            <p class="card-title-desc">
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>{{ __('Num Facture') }}</th>
                                        <th>{{ __('Societé') }}</th>
                                        <th>{{ __('ICE') }}</th>
                                        <th>{{ __('Date Commande') }}</th>
                                        <th>{{ __('Produits') }}</th>
                                        <th>{{ __('Mode de reglement') }}</th>
                                        <th>{{ __('Versement') }}</th>
                                        <th>{{ __('Reste') }}</th>
                                        <th>{{ __('Date Facture') }}</th>
                                        <th>{{ __('TOTAL TTC') }}</th>
                                        <th>{{ __('TVA') }}</th>
                                        <th>{{ __('TOTAL HT') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($factures as $f)
                                        <tr data-facture-id="{{$f->id}}">
                                            <td>{{$f->facture_numero}}</td>
                                            <td>{{$f->societe}}</td>
                                            <td>{{$f->ice}}</td>
                                            <td>{{ $f->date_commande }}</td>
                                            <td><select id="" class="form-select" readonly>
                                            <option value="">Liste</option>
                                            @php
                                                $stringData = $f->products;
                                                $dataArray = json_decode($stringData);
                                            @endphp
                                                @foreach ($dataArray as $p)
                                                <option value="{{$p[0]}}">{{$p[1]}} {{$p[2]}} | Qte : {{$p[4]}}</option>
                                                @endforeach
                                            </select></td>
                                            <td>{{ $f->mode_reglement }}</td>
                                            <td>{{ $f->versement }}</td>
                                            <td>{{ $f->reste }}</td>
                                            <td>{{ $f->date_facture }}</td>
                                            <td>{{ $f->total_TTC }}</td>
                                            <td>{{ $f->TVA }}</td>
                                            <td>{{ $f->total_HT }}</td>

                                            <td>
                                                <button type="button" class="btn delete-facture" data-facture-id="{{ $f->id }}">
                                                    <i class="ri-delete-bin-3-line"></i>
                                                </button>
                                                <form action="{{ route('pdf.f', ['id' => $f->id]) }}" method="get" style="display: inline;">
                                                    <button class="btn print-facture" data-facture-id="{{ $f->id }}">
                                                        <i class="ri-file-info-line"></i>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                        @endforeach

                                    @include('admin.layouts.components.factures.edit-modal')
                                    @include('admin.layouts.components.factures.add-modal')
                                    @include('admin.layouts.components.factures.confirm-modal')
                                    
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    $(document).ready(function() {

        $('.print-facture').click(async function(){
        const id = $(this).data('facture-id');
        // console.log('salut');
        const res = await axios.get('/factures/print/'+ id);
    })

    });
    
</script>
@endsection


