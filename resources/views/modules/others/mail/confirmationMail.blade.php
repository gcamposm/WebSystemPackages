@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => '¡Buenas!',
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')
        <center>
        <p>Su reserva ha sido realizada con éxito</p>
        <p>Recuerde que para realizar el check-in debe acceder con el siguiente código:</p>
        <p><strong>{{ $venta->source }}</strong></p>
        </center>
    @include('beautymail::templates.sunny.contentEnd')

@stop