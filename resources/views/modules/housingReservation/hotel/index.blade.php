@extends('layouts.app')

@section('content') 
<section id="pricing">
    <div class="container">
        <div class="row">
            @foreach($hotels as $hotel)
                <div class="col-lg-4 col-md-6">
                    <div class="box featured wow fadeInUp">
                        <img class="img-fluid" src="https://source.unsplash.com/600x600/?hotel={{ mt_rand(500, 50000) }}" alt="{{$hotel->nombre}}" style="padding-bottom: 8% !important;">
                        <ul>
                            <li><i class="ion-android-checkmark-circle"></i>Nombre: {{ $hotel->nombre }}</li>
                            <li><i class="ion-android-checkmark-circle"></i>{{ $hotel->direccion }}, {{ $hotel->ciudad }}</li>
                            <img src="img/{{$hotel->estrellas}}.png">
                           <li><i class="ion-android-checkmark-circle"></i>Valoración: {{ $hotel->valoracion }}</li>
                           <li><i class="ion-android-checkmark-circle"></i>Capacidad: {{ $hotel->capacidad }}</li>
                        </ul>
                        <center>
                            <form action="hotel_room" method="GET">
                            @csrf
                                <button id="hotel_id" name="hotel_id" value="{{ $hotel->id }}" style="margin-top: 0.2cm;" type="submit" class="btn btn-success btn-galaxy">Ver habitaciones</button>
                            </form>
                        </center>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
