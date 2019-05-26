@extends('layouts.app')
@section('content')
 <div class="card buy-card flex-fill">
    <div class="card-body buy-card-body">
        <center>
            <img src="img/happy.png" alt="Sorry" style="width:200px">
            <h2 class="text-center">Gracias!!</h2>
            <p class="text-center">Le informamos que su check-in ha sido realizado exitosamente. Si desea seguir viendo nuestros productos presione "Ok".</p>
            <button type="submit" class="btn btn-galaxy wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <a href="/">Ok</a>
            </button>
        </center>  
    </div>
</div>
@endsection