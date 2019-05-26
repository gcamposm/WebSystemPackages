  <div class="form">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark text-center">
              <tr>
                  <th class="align-middle">Nombre de Usuario</th>
                  <th class="align-middle">Venta Asociada</th>
                  <th class="align-middle">Precio de la Reserva</th>
                  <th class="align-middle">Fecha de la Ingreso</th>
                  <th class="align-middle">Fecha de la Egreso</th>
                  <th class="align-middle">Cantidad</th>
                  <th class="align-middle">Monto Total</th>
                  <th class="align-middle">Descuento</th>
                  <th class="align-middle"></th>
              </tr>
        </thead>
        <tbody class="text-center align-middle">
          @foreach($hotelReservations as $hotelReservation)
            <tr>
              <td class="align-middle">{{$hotelReservation->sell->user->name}}</td>
              <td class="align-middle">{{$hotelReservation->sell->source}}</td>
              <td class="align-middle">{{$hotelReservation->precio}}</td>
              <td class="align-middle">{{$hotelReservation->fecha_ingreso}}</td>
              <td class="align-middle">{{$hotelReservation->fecha_egreso}}</td>
              <td class="align-middle">{{$hotelReservation->cantidad}}</td>
              <td class="align-middle">{{$hotelReservation->monto_total}}</td>
              <td class="align-middle">{{$hotelReservation->descuento}}</td>
              <td class="align-middle">
              <form action="/admin/hotelReservation/{{ $hotelReservation->id }}" method="post">
                @method('DELETE')
                @csrf
                <input type="hidden" name="actual_user_id" id="actual_user_id" value="{{ Crypt::encrypt(Auth::user()->id) }}">
                <center>
                  <button type="submit" class="btn btn-danger" id="hotelReservation" name="hotelReservation"><span>Eliminar</span> </button>
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

