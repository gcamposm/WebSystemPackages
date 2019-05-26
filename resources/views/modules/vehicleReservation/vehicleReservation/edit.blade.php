  <div class="form">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark text-center">
              <tr>
                  <th class="align-middle">Nombre de Usuario</th>
                  <th class="align-middle">Venta Asociada</th>
                  <th class="align-middle">Fecha de la Retiro</th>
                  <th class="align-middle">Fecha de la Regreso</th>
                  <th class="align-middle">Fecha de la Reserva</th>
                  <th class="align-middle">Monto total</th>
                  <th class="align-middle"></th>
              </tr>
        </thead>
        <tbody class="text-center align-middle">
          @foreach($vehicleReservations as $vehicleReservation)
            <tr>
              <td class="align-middle">{{ $vehicleReservation->sell->user->name }}</td>
              <td class="align-middle">{{ $vehicleReservation->fecha_retiro }}</td>
              <td class="align-middle">{{ $vehicleReservation->fecha_regreso }}</td>
              <td class="align-middle">{{ $vehicleReservation->created_at }}</td>
              <td class="align-middle">{{ $vehicleReservation->monto_total }}</td>
              <td class="align-middle">
              <form action="/admin/vehicleReservation/{{ $vehicleReservation->id }}" method="post">
                @method('DELETE')
                @csrf
                <input type="hidden" name="actual_user_id" id="actual_user_id" value="{{ Crypt::encrypt(Auth::user()->id) }}">
              <center>
                <button type="submit" class="btn btn-danger btn-galaxy" id="vehicleReservation" name="vehicleReservation"><span>Eliminar</span> </button>
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

