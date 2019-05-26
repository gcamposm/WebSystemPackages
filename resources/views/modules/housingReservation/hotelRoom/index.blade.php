@extends('layouts.app')

@section('content') 
<section id="pricing">
    <div class="container">
    <center>
      <h1 class="align-middle" style="font-size:25px !important; margin-bottom: 5%;">
        Habitaciones Disponibles
      </h1>
    </center>
        <div class="row">
            @foreach($hab_disp as $hab)
                <div class="col-lg-4 col-md-6">
                    <div class="box featured wow fadeInUp">
                        <h4><sup>$</sup>{{ $hab->precio }}</h4>
                        <img class="img-fluid" src="https://source.unsplash.com/600x600/?bedroom={{ mt_rand(500, 50000) }}" style="padding-bottom: 8% !important;">
                        <ul>
                            <li><i class="ion-android-checkmark-circle"></i>Capacidad: {{ $hab->capacidad }}</li>
                           <li><i class="ion-android-checkmark-circle"></i>Camas: {{ $hab->camas }}</li>
                           {{-- <li><i class="ion-android-checkmark-circle"></i>Número: {{ $hab->numero }}</li>
                           <li><i class="ion-android-checkmark-circle"></i>Precio: {{ $hab->precio }}</li>--}}
                        </ul>
                       <center>  
                      <button style="margin-top: 0.2cm;" type="submit" class="btn btn-success btn-galaxy" data-toggle="modal" data-target="#modal-housing-reservation-{{ $hab->id }}">Ver detalles</button>
                      @include('modules.housingReservation.hotelReservationDetail.index') 
                    </center>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection