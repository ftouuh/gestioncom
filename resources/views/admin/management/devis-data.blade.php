@extends('admin.layouts.home')
@section('content')
<div class="main-content">
<style>
        .add-new {
            display: flex;
            widtd: 100%;
            justify-content: space-between;
        }

        .add-devis {
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

                            <h4 class="card-title">Liste Des Devis</h4>
                            <button class="btn-primary add-devis">{{ __('Ajouter Une Devis') }}</button>
                                <p class="card-title-desc">
                            <p class="card-title-desc">
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; widtd: 100%;">
                                <tdead>
                                    <tr>
                                        <td>{{ __('Numero Devis') }}</td>
                                        <td>{{ __('Societé') }}</td>
                                        <td>{{ __('ICE') }}</td>
                                        <td>{{ __('Date Commande') }}</td>
                                        <td>{{ __('Produits') }}</td>
                                        <td>{{ __('Mode de reglement') }}</td>
                                        <td>{{ __('Versement') }}</td>
                                        <td>{{ __('Reste') }}</td>
                                        <td>{{ __('Date Devis') }}</td>
                                        <td>{{ __('TOTAL TTC') }}</td>
                                        <td>{{ __('TVA') }}</td>
                                        <td>{{ __('TOTAL HT') }}</td>
                                        <td>{{ __('Action') }}</td>
                                    </tr>
                                </tdead>
                                <tbody>
                                    @foreach ($devis as $d)
                                        <tr data-devis-id="{{$d->id}}">
                                            <td>{{$d->devis_numero}}</td>
                                            <td>{{$d->societe}}</td>
                                            <td>{{$d->ice}}</td>
                                            <td>{{ $d->date_commande }}</td>
                                            <td><select id="" class="form-select" readonly>
                                            <option value="">Liste</option>
                                            @php
                                                $stringData = $d->products;
                                                $dataArray = json_decode($stringData);
                                            @endphp
                                                @foreach ($dataArray as $p)
                                                <option value="{{$p[0]}}">{{$p[1]}} {{$p[2]}} | Qte : {{$p[4]}}</option>
                                                @endforeach
                                            </select></td>
                                            <td>{{ $d->mode_reglement }}</td>
                                            <td>{{ $d->versement }}</td>
                                            <td>{{ $d->reste }}</td>
                                            <td>{{ $d->date_devis }}</td>
                                            <td>{{ $d->total_TTC }}</td>
                                            <td>{{ $d->TVA }}</td>
                                            <td>{{ $d->total_HT }}</td>

                                            <td>
                                                <button type="button" class="btn delete-devis" data-devis-id="{{ $d->id }}">
                                                    <i class="ri-delete-bin-3-line"></i>
                                                </button>
                                                <form action="{{ route('pdf.d', ['id' => $d->id]) }}" metdod="get" style="display: inline;">
                                                    <button class="btn print-devis" data-devis-id="{{ $d->id }}">
                                                        <i class="ri-file-info-line"></i>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                        @endforeach

                                    @include('admin.layouts.components.devis.edit-modal')
                                    @include('admin.layouts.components.devis.add-modal')
                                    @include('admin.layouts.components.devis.confirm-modal')
                                    
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
                        Crafted witd <i class="mdi mdi-heart text-danger"></i> by reda-elklie
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

        $('.print-devis').click(async function(){
        const id = $(tdis).data('devis-id');
        // console.log('salut');
        const res = await axios.get('/deviss/print/'+ id);
    })

    });
    
</script>
@endsection


