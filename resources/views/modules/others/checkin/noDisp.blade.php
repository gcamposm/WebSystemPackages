@extends('layouts.app')
@section('content')
 <div class="card buy-card flex-fill">
    <div class="card-body buy-card-body">
        <center>
            <img src="img/sad.png" alt="Sorry" style="width:200px">
            <h1>Upps, Su código no existe o su check-in ya fue realizado</h1>
            <button type="submit" class="btn btn-galaxy wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <a href="/">Inicio</a>
            </button>
        </center>  
    </div>
</div>
@endsection