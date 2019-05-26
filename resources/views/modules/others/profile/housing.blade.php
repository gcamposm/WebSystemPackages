<div class="form">
  @if (count($sell->hotelReservation) != 0)
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark text-center">
          <tr>
              <th class="align-middle">Código de la compra</th>
              <th class="align-middle">Fecha de compra</th>
              <th class="align-middle">Monto pagado</th>
              <th class="align-middle">Fecha de ingreso</th>
              <th class="align-middle">Fecha de salida</th>
              <th class="align-middle">Cantidad</th>
               <th class="align-middle">Descuento</th>
              {{-- <th class="align-middle">Zona</th>
              <th class="align-middle">Proveedor</th>
              <th class="align-middle">Patente del Vehículo</th> --}}

          </tr>
        </thead>
        <tbody class="text-center align-middle text-light">   
          @foreach ($sell->hotelReservation as $hotelReservation)
            <tr>
              <td class="align-middle">{{ $sell->source }}</td>
              <td class="align-middle">{{ $hotelReservation->created_at }}</td>
              <td class="align-middle">{{ $hotelReservation->monto_total }}</td>
              <td class="align-middle">{{ $hotelReservation->fecha_ingreso }}</td>
              <td class="align-middle">{{ $hotelReservation->fecha_egreso }}</td>
              <td class="align-middle">{{ $hotelReservation->cantidad }}</td>
              <td class="align-middle">{{ $hotelReservation->descuento }}</td>
              {{-- <td class="align-middle">{{ $hotelReservation->vehicle->zone->nombre }}</td>
              <td class="align-middle">{{ $hotelReservation->vehicle->vehicleProvider->politica_combustible }}</td>
              <td class="align-middle">{{ $hotelReservation->vehicle->patente }}</td>
              <td class="align-middle">{{ $hotelReservation->vehicle->marca }}</td>
              <td class="align-middle">{{ $hotelReservation->vehicle->tipo }}</td>
              <td class="align-middle">{{ $hotelReservation->vehicle->gamma }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->transmision }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->combustible }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->n_pasajeros }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->equipaje_g }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->equipaje_p }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->n_puertas }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->n_kilometraje }}</td>
              <td class="align-middle">{{ $vehicleReservation->vehicle->aire_acondicionado }}</td> --}}
            </tr>
          @endforeach
        </tbody>
      </table> 
      </center>
    </div>
  @endif
</div>

