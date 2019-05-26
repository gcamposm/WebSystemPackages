@extends('layouts.app')

@section('content') 
<section id="pricing">
    <div class="container">
        <div class="row">
            @foreach($insurances as $insurance)
                <div class="col-lg-4 col-md-6">
                    <div class="box featured wow fadeInUp">
                        <img class="img-fluid" src="{{ asset('/img/insurance.png') }}" alt="insurance" style="padding-bottom: 8% !important;">
                        <ul>
                            <li><i class="ion-android-checkmark-circle"></i>Precio: {{$insurance->price}}</li>
                            <li><i class="ion-android-checkmark-circle"></i>{{$insurance->medicalService}}</li>
                            <li><i class="ion-android-checkmark-circle"></i>{{$insurance->service2}}</li>
                            <li><i class="ion-android-checkmark-circle"></i>{{$insurance->service3}}</li>
                            <li><i class="ion-android-checkmark-circle"></i>{{$insurance->groupsize}}</li>
                        </ul>
                        <center>
                            <form action="{{ route('cart.storeInsurance', $insurance) }}" method="POST">
                            @csrf
                                <button style="margin-top: 0.2cm;" type="submit" class="btn btn-success btn-galaxy">Añadir al carrito</button>
                            </form>
                        </center>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection