@extends('layouts.app')

@section('content') 
<section id="pricing">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div class="row">
            @foreach($flight as $vuelo)
                <div class="col-lg-4 col-md-6">
                    <div class="box featured wow fadeInUp">
                        @if($cabina == 3)
                            <h4><sup>$</sup>{{ $vuelo->precio_economy }}</h4>
                            <h5>Economy</h5>
                        @endif
                        @if($cabina == 2)
                            <h4><sup>$</sup>{{ $vuelo->precio_bussiness }}</h4>
                                <h5>Bussiness</h5>
                        @endif
                        @if($cabina == 1)
                            <h4><sup>$</sup>{{ $vuelo->precio_premium }}</h4>
                                <h5>Premium</h5>
                        @endif
                        <img class="img-fluid" src="https://picsum.photos/300/200?image={{ mt_rand(1043, 1052) }}" style="padding-bottom: 8% !important;">
                        <ul>
                            <li><i class="ion-android-checkmark-circle"></i>Escalas: {{ $vuelo->escalas}}</li>
                            <li><i class="ion-android-checkmark-circle"></i>Destino: {{ $vuelo->destiny->ciudad }}</li>
                            <li><i class="ion-android-checkmark-circle"></i>Salida: {{ $vuelo->fecha_despegue }}</li>
                            <li><i class="ion-android-checkmark-circle"></i>Llegada: {{ $vuelo->fecha_aterrizaje }}</li>
                        </ul>
                        <center>
                            <center>
                                <button style="margin-top: 0.2cm;" type="submit" class="btn btn-success btn-galaxy" data-toggle="modal" data-target="#modal-vehicle-reservation-{{ $vuelo->id }}">Ver detalles</button>
                                @include('modules.flightReservation.flight.index')
                            </center>
                        </center>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
