<!-- Contenido del accordion de aéreo -->
<div class="accordion" id="flighAccordion">

    <!-- Vuelos -->
    <div class="card">
        <div class="card-header" id="flightAccordionOne">
            <h5 class="d-flex justify-content-between">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#flightOne" aria-expanded="false" aria-controls="flightOne">
                    <i class="fas fa-fw fa-plane"></i>
                    Vuelos
                </button>
                <form action="/admin/flight/" method="post">
                    @method('POST')
                    @csrf
                    <button type="button" class="btn btn-success btn-galaxy" data-toggle="modal" data-target="#modal-flight-store">
                        Agregar
                    </button>
                    @include('modules.flightReservation.flight.store')
                </form> 
            </h5>
        </div>
        <div id="flightOne" class="collapse" aria-labelledby="flightAccordionOne" data-parent="#flighAccordion">
            <div class="card-body">
                @include('modules.flightReservation.flight.edit')
            </div>
        </div>
    </div>

    <!-- Reservas de Vuelo -->
    <div class="card">
        <div class="card-header" id="flightAccordionTwo">
            <h5 class="d-flex justify-content-between">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#flightTwo" aria-expanded="false" aria-controls="flightTwo">
                    <i class="fas fa-fw fa-plane"></i>
                    Reservas de Vuelos
                </button>
            </h5>
        </div>
        <div id="flightTwo" class="collapse" aria-labelledby="flightAccordionTwo" data-parent="#flighAccordion">
            <div class="card-body">
                @include('modules.flightReservation.flightdetail.edit')
            </div>
        </div>
    </div>
</div>