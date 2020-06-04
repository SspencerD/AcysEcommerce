@extends('layouts.dashboard')

@section('title','Dashboard |' .config('app.name'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    @include('includes.flash-messages')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Historicos de pago</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Id de venta</th>
                            <th>Usuario</th>
                            <th>Monto</th>
                            <th>Estado</th>
                            <th>Metodo de pago</th>
                            <th>Carrito</th>
                            <th>Creado</th>
                        </tr>
                        @foreach($historial as $histo)
                        <tr>
                            <th>{{ $histo->id }}</th>
                            <th>{{ $histo->id_payment_merchant }} </th>
                            <th>{{ $histo->user_name }} </th>
                            <th>$ {{ number_format($histo->amount,2) }} </th>
                            <th>@if($histo->status =='completed')
                               <h2 class="badge badge-success" style="font-size: 20px; ">Pagado</h2>
                               @elseif($histo->status =='pending')
                               <p class="badge badge-warning" style="font-size: 20px;">Pendiente de pago</p>
                               @else
                               <p class="badge badge-danger" style="font-size: 20px;"> Cancelado o Rechazado</p>
                               @endif
                             </th>
                            <th>{{ $histo->paymentPlatform->name}} </th>
                            <th>{{ $histo->cart_id }} </th>
                            <th>{{ $histo->created_at->format('d/m/Y H:i:s')}} </th>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
                <div class="align-content-md-center">
                    {{ $historial->links() }}
                </div>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection