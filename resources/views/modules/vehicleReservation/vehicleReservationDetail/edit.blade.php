  <div class="form">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark text-center">
              <tr>
                  <th class="align-middle">Nombre de Usuario</th>
                  <th class="align-middle">Patente del Vehículo</th>
                  <th class="align-middle">Fecha de Retiro</th>
                  <th class="align-middle">Fecha de Regreso</th>
                  <th class="align-middle">Precio de la Reserva</th>
                  <th class="align-middle">Descuento</th>
                  <th class="align-middle">Cantidad</th>
                  <th class="align-middle"></th>
              </tr>
        </thead>
        <tbody class="text-center align-middle">
          @foreach($vehicleReservationDetails as $vehicleReservationDetail)
            <tr>
              <td class="align-middle">{{$vehicleReservationDetail->vehicleReservation->sell->user->name}}</td>
              <td class="align-middle">{{$vehicleReservationDetail->patente}}</td>
              <td class="align-middle">{{$vehicleReservationDetail->fecha_retiro}}</td>
              <td class="align-middle">{{$vehicleReservationDetail->fecha_regreso}}</td>
              <td class="align-middle">{{$vehicleReservationDetail->precio_reserva}}</td>
              <td class="align-middle">{{$vehicleReservationDetail->descuento}}</td>
              <td class="align-middle">{{$vehicleReservationDetail->cantidad}}</td>
              <td class="align-middle">
              <form action="/vehicleReservationDetail/{{ $vehicleReservationDetail->id }}" method="post">
                @method('DELETE')
                @csrf
              <center>
                <button type="submit" class="btn btn-danger" id="vehicleReservationDetail" name="vehicleReservationDetail"><span>Eliminar</span> </button>
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

