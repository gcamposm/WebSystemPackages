@extends('layouts.app')

@section('content')
    <section id="pricing">
        <div class="container">
            <div class="row">
                @foreach($packages as $package)
                    <div class="col-lg-4 col-md-6">
                        <div class="box featured wow fadeInUp">
                            <h4><sup>$</sup>{{ $package->precio}}</h4>
                            <img class="img-fluid" src="https://source.unsplash.com/600x600/?bedroom={{ mt_rand(500, 50000) }}" style="padding-bottom: 8% !important;">
                            <ul>
                                <li><i class="ion-android-checkmark-circle"></i>Id: {{ $package->id }}</li>
                                <li><i class="ion-android-checkmark-circle"></i>Vehiculo: {{ $package->vehicle->marca}}</li>
                                <li><i class="ion-android-checkmark-circle"></i>Tipo vehiculo: {{ $package->vehicle->tipo }}</li>
                                <li><i class="ion-android-checkmark-circle"></i>Destino: {{ $package->vehicle->zone->ciudad}}</li>
                                <li><i class="ion-android-checkmark-circle"></i>Duración: {{ $package->getDias() }}</li>
                            </ul>
                            <center>
                                <button style="margin-top: 0.2cm;" type="submit" class="btn btn-success btn-galaxy" data-toggle="modal" data-target="#modal-housing-reservation-{{ $package->id }}">Ver detalles</button>
                                @include('modules.others.package.modalvv')
                            </center>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
