<!-- Contenido del accordion de transporte -->
<div class="accordion" id="vehicleAccordion">

    <!-- Vehículos -->
    <div class="card">
        <div class="card-header" id="vehicleAccordionOne">
            <h5 class="d-flex justify-content-between">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#vehicleOne" aria-expanded="false" aria-controls="vehicleOne">
                    <i class="fas fa-fw fa-car"></i>
                    Vehículo
                </button>
                <form action="/admin/vehicle/" method="post">
                    @method('POST')
                    @csrf
                    <input type="hidden" name="actual_user_id" id="actual_user_id" value="{{ Crypt::encrypt(Auth::user()->id) }}">
                    <button type="button" class="btn btn-success btn-galaxy" data-toggle="modal" data-target="#modal-vehicle-store">
                        Agregar
                    </button>
                    @include('modules.vehicleReservation.vehicle.store')
                </form> 
            </h5>
        </div>
        <div id="vehicleOne" class="collapse" aria-labelledby="vehicleAccordionOne" data-parent="#vehicleAccordion">
            <div class="card-body">
                @include('modules.vehicleReservation.vehicle.edit')
            </div>
        </div>
    </div>

    <!-- Reservas de Vehículo -->
    <div class="card">
        <div class="card-header" id="vehicleAccordionTwo">
            <h5 class="d-flex justify-content-between">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#vehicleTwo" aria-expanded="false" aria-controls="vehicleTwo">
                    <i class="fas fa-fw fa-car"></i>
                    Reservas de Vehículos
                </button>
            </h5>
        </div>
        <div id="vehicleTwo" class="collapse" aria-labelledby="vehicleAccordionTwo" data-parent="#vehicleAccordion">
            <div class="card-body">
                @include('modules.vehicleReservation.vehicleReservation.edit')
            </div>
        </div>
    </div>
</div>