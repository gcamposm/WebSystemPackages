@extends('layouts.app')

@section('content')
<section id="pricing">
  <div class="container">
    <center>
      <h1 class="align-middle" style="font-size:25px !important; margin-bottom: 5%;">
        Vehículos Disponibles
      </h1>
    </center>
    <div class="row">
        @foreach($vehicles as $vehicle)
            <div class="col-lg-4 col-md-6">
                <div class="box featured wow fadeInUp">
                    <h4><sup>$</sup>{{ $vehicle->precio }}</h4>
                    <h3 style="color: grey">{{ $vehicle->marca }}</h3>
                    <img class="img-fluid" src="https://picsum.photos/200/200?image={{ mt_rand(1, 50) }}" style="padding-bottom: 8% !important;">
                    <ul>
                        <li><i class="ion-android-checkmark-circle"></i>Patente: {{ $vehicle->id }}</li>
                        <li><i class="ion-android-checkmark-circle"></i>Patente: {{ $vehicle->patente }}</li>
                        <li><i class="ion-android-checkmark-circle"></i>Marca: {{ $vehicle->marca }}</li>
                        <li><i class="ion-android-checkmark-circle"></i>Tipo: {{ $vehicle->tipo }}</li>
                        {{-- <li><i class="ion-android-checkmark-circle"></i>Gamma: {{ $vehicle->gamma }}</li>
                        <li><i class="ion-android-checkmark-circle"></i>Transmisión: {{ $vehicle->transmision }}</li>
                        <li><i class="ion-android-checkmark-circle"></i>Combustible: {{ $vehicle->combustible }}</li> --}}
                    </ul>
                    <center>  
                      <button style="margin-top: 0.2cm;" type="submit" class="btn btn-success btn-galaxy" data-toggle="modal" data-target="#modal-vehicle-reservation-{{ $vehicle->id }}">Ver detalles</button>
                      @include('modules.vehicleReservation.vehicleReservationDetail.index') 
                    </center>
                </div>
            </div>
        @endforeach
    </div>
  </div>
</section>
@endsection