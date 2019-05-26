<!-- Contenido del accordion de transporte -->
<div class="accordion" id="insuranceAccordion">

    <!-- Vehículos -->
    <div class="card">
        <div class="card-header" id="insuranceAccordionOne">
            <h5 class="d-flex justify-content-between">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#insuranceOne" aria-expanded="false" aria-controls="insuranceOne">
                    <i class="fas fa-heartbeat"></i>
                    Seguros
                </button>
                <form action="/admin/insurance/" method="post">
                    @method('POST')
                    @csrf
                    <button type="button" class="btn btn-success btn-galaxy" data-toggle="modal" data-target="#modal-insurance-store">
                        Agregar
                    </button>
                    @include('modules.others.insurance.store')
                </form> 
            </h5>
        </div>
        <div id="insuranceOne" class="collapse" aria-labelledby="insuranceAccordionOne" data-parent="#insuranceAccordion">
            <div class="card-body">
                @include('modules.others.insurance.edit')
            </div>
        </div>
    </div>

    <!-- Reservas de Vehículo -->
    <div class="card">
        <div class="card-header" id="insuranceAccordionTwo">
            <h5 class="d-flex justify-content-between">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#insuranceTwo" aria-expanded="false" aria-controls="insuranceTwo">
                    <i class="fas fa-heartbeat"></i>
                    Reservas de Seguros
                </button>
            </h5>
        </div>
        <div id="insuranceTwo" class="collapse" aria-labelledby="insuranceAccordionTwo" data-parent="#insuranceAccordion">
            <div class="card-body">
                @include('modules.others.insuranceReservation.edit')
            </div>
        </div>
    </div>
</div>