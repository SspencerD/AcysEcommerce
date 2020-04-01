@extends('layouts.pay')
@section('title',' Autentificación bancaria |' .config('app.name'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Complete los siguientes pasos</div>

                <div class="card-body">
                    <p>Necesita seguir los siguientes pasos de su banco para confirmar el pago</p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe('{{ config('services.stripe.key') }}');
    stripe.handleCardAction("{{ $clientSecret }}")
        .then(function (result) {
            if (result.error) {
                window.location.replace("{{ route('cancelled') }}");
            } else {
                window.location.replace("{{ route('approval') }}");
            }
        });
</script>
@endpush
@endsection