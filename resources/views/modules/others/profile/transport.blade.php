<div class="form">
  @if (count($sell->vehicleReservation) != 0)
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark text-center">
          <tr>
              <th class="align-middle">Código de la compra</th>
              <th class="align-middle">Fecha de compra</th>
              <th class="align-middle">Monto pagado</th>
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
              <th class="align-middle">Aire Acondicionado</th>
          </tr>
        </thead>
        <tbody class="text-center align-middle text-light">   
          @foreach ($sell->vehicleReservation as $vehicleReservation)
            <tr>
              <td class="align-middle">{{ $sell->source }}</td>
              <td class="align-middle">{{ $vehicleReservation->created_at }}</td>
              <td class="align-middle">{{ $vehicleReservation->monto_total }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->zone->nombre }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->vehicleProvider->politica_combustible }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->patente }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->marca }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->tipo }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->gamma }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->transmision }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->combustible }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->n_pasajeros }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->equipaje_g }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->equipaje_p }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->n_puertas }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->n_kilometraje }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->aire_acondicionado }}</td>
            </tr>
          @endforeach
        </tbody>
      </table> 
      </center>
    </div>
  @endif
</div>

