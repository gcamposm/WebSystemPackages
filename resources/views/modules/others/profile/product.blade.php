<div class="accordion" style="color: white !important;" id="mainAccordion">
    
    <!-- Aéreo -->
    <div class="card">
        <div class="card-header" id="flightAccordion">
            <h5 class="d-flex justify-content-between">
            <button class="btn btn-link collapsed" style="color: white !important;" type="button" data-toggle="collapse" data-target="#flight" aria-expanded="false" aria-controls="flight">
                <i class="fas fa-fw fa-plane"></i>
                Vuelos
            </button>
            </h5>
        </div>
        <div id="flight" class="collapse" aria-labelledby="flightAccordion" data-parent="#mainAccordion">
            <div class="card-body">
                @foreach ($sells as $sell)
                    @include('modules.others.profile.flight')
                @endforeach
            </div>
        </div>
    </div>

    <!-- Alojamiento -->
    <div class="card">
        <div class="card-header" id="housingAccordion">
            <h5 class="d-flex justify-content-between">
            <button class="btn btn-link collapsed" style="color: white !important;" type="button" data-toggle="collapse" data-target="#housing" aria-expanded="false" aria-controls="housing">
                <i class="fas fa-fw fa-building"></i>
                Alojamiento
            </button>
            </h5>
        </div>
        <div id="housing" class="collapse" aria-labelledby="housingAccordion" data-parent="#mainAccordion">
            <div class="card-body">
                @foreach ($sells as $sell)
                    @include('modules.others.profile.housing')
                @endforeach
            </div>
        </div>
    </div>

    <!-- Transporte -->
    <div class="card">
        <div class="card-header" id="transportAccordion">
            <h5 class="d-flex justify-content-between">
            <button class="btn btn-link collapsed" style="color: white !important;" type="button" data-toggle="collapse" data-target="#transport" aria-expanded="false" aria-controls="transport">
                <i class="fas fa-fw fa-car"></i>
                Transporte
            </button>
            </h5>
        </div>

        <div id="transport" class="collapse" aria-labelledby="transportAccordion" data-parent="#mainAccordion">
            <div class="card-body">
                @foreach ($sells as $sell)
                    @include('modules.others.profile.transport')
                @endforeach
            </div>
        </div>
    </div>

    <!-- Insurance -->
    <div class="card">
        <div class="card-header" id="insuranceAccordion">
            <h5 class="d-flex justify-content-between">
            <button class="btn btn-link collapsed" style="color: white !important;" type="button" data-toggle="collapse" data-target="#insurance" aria-expanded="false" aria-controls="insurance">
                <i class="fas fa-fw fa-car"></i>
                Seguros
            </button>
            </h5>
        </div>

        <div id="insurance" class="collapse" aria-labelledby="insuranceAccordion" data-parent="#mainAccordion">
            <div class="card-body">
                @foreach ($sells as $sell)
                    @include('modules.others.profile.insurance')
                @endforeach
            </div>
        </div>
    </div>

    <!-- Package -->
    <div class="card">
        <div class="card-header" id="packageAccordion">
            <h5 class="d-flex justify-content-between">
            <button class="btn btn-link collapsed" style="color: white !important;" type="button" data-toggle="collapse" data-target="#package" aria-expanded="false" aria-controls="package">
                <i class="fas fa-fw fa-car"></i>
                Paquetes
            </button>
            </h5>
        </div>

        <div id="package" class="collapse" aria-labelledby="packageAccordion" data-parent="#mainAccordion">
            <div class="card-body">
                @foreach ($sells as $sell)
                    @include('modules.others.profile.package')
                @endforeach
            </div>
        </div>
    </div>
</div>