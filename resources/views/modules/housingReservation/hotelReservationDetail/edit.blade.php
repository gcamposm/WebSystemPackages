  <div class="form">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark text-center">
              <tr>
                  <th class="align-middle">Nombre del Hotel</th>
                  <th class="align-middle">Número de Habitación</th>
                  <th class="align-middle">Nombre de Usuario</th>
                  <th class="align-middle">Fecha de la Ingreso</th>
                  <th class="align-middle">Fecha de la Egreso</th>
                  <th class="align-middle">Precio de la Reserva</th>
                  <th class="align-middle">Tipo de Reserva</th>
                  <th class="align-middle"></th>
              </tr>
        </thead>
        <tbody class="text-center align-middle">
          @foreach($hotelReservationDetails as $hotelReservationDetail)
            <tr>
              <td class="align-middle">{{$hotelReservationDetail->hotelRoom->hotel->nombre}}</td>
              <td class="align-middle">{{$hotelReservationDetail->hotelRoom->numero}}</td>
              <td class="align-middle">{{$hotelReservationDetail->hotelReservation->sell->user->name}}</td>
              <td class="align-middle">{{$hotelReservationDetail->fecha_ingreso}}</td>
              <td class="align-middle">{{$hotelReservationDetail->fecha_egreso}}</td>
              <td class="align-middle">{{$hotelReservationDetail->precio}}</td>
              <td class="align-middle">{{$hotelReservationDetail->tipo}}</td>
              <td class="align-middle">
              <form action="/hotelReservationDetail/{{ $hotelReservationDetail->id }}" method="post">
                @method('DELETE')
                @csrf
                <center>
                  <button type="submit" class="btn btn-danger" id="hotelReservationDetail" name="hotelReservationDetail"><span>Eliminar</span> </button>
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

