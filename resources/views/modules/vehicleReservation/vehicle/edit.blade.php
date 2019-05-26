<div class="form">
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark text-center">
            <tr>
                <th class="align-middle">Zona</th>
                <th class="align-middle">Proveedor</th>
                <th class="align-middle">Patente del Vehículo</th>
                <th class="align-middle">Marca</th>
                <th class="align-middle">Tipo de Vehículo</th>
                <th class="align-middle">Gamma</th>
                <th class="align-middle">Transmisión</th>
                <th class="align-middle">Tipo de Combustible</th>
                <th class="align-middle">Nº de Pasajeros</th>
                <th class="align-middle">Equipaje Grande</th>
                <th class="align-middle">Equipaje Pequeño</th>
                <th class="align-middle">Nº de Puertas</th>
                <th class="align-middle">Nº de Kilometraje</th>
                <th class="align-middle">Precio/Hora</th>
                <th class="align-middle">Aire Acondicionado</th>
                <th class="align-middle"></th>
                <th class="align-middle"></th>
            </tr>
      </thead>
      <tbody class="text-center align-middle">
        @foreach($vehicles as $vehicle)
          <tr>
            <td class="align-middle">{{$vehicle->zone->nombre}}</td>
            <td class="align-middle">{{$vehicle->vehicleProvider->politica_combustible}}</td>
            <td class="align-middle">{{$vehicle->patente}}</td>
            <td class="align-middle">{{$vehicle->marca}}</td>
            <td class="align-middle">{{$vehicle->tipo}}</td>
            <td class="align-middle">{{$vehicle->gamma}}</td>
            <td class="align-middle">{{$vehicle->transmision}}</td>
            <td class="align-middle">{{$vehicle->combustible}}</td>
            <td class="align-middle">{{$vehicle->n_pasajeros}}</td>
            <td class="align-middle">{{$vehicle->equipaje_g}}</td>
            <td class="align-middle">{{$vehicle->equipaje_p}}</td>
            <td class="align-middle">{{$vehicle->n_puertas}}</td>
            <td class="align-middle">{{$vehicle->n_kilometraje}}</td>
            <td class="align-middle">{{$vehicle->precio}}</td>
            <td class="align-middle">{{$vehicle->aire_acondicionado}}</td>
            <td class="align-middle">
            <center>
              <button type="button" class="btn btn-primary btn-galaxy" data-toggle="modal" data-target="#modal-vehicle-update-{{ $vehicle->id }}">
                Editar
              </button>
            </center>
              @include('modules.vehicleReservation.vehicle.update') 
            </td>
            <td class="align-middle">
            <form action="/admin/vehicle/{{ $vehicle->id }}" method="post">
              @method('DELETE')
              @csrf
              <input type="hidden" name="actual_user_id" id="actual_user_id" value="{{ Crypt::encrypt(Auth::user()->id) }}">
            <center>
              <button type="submit" class="btn btn-danger btn-galaxy" id="vehiculo_id" name="vehiculo_id"><span>Eliminar</span> </button>
            </center>
            </form>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table> 
    </center>
  </div>
</div>

