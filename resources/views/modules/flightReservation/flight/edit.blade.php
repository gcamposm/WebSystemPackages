  <div class="form">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark text-center">
              <tr>
                  <th class="align-middle">Precio Economy</th>
                  <th class="align-middle">Precio Business</th>
                  <th class="align-middle">Precio Premium</th>
                  <th class="align-middle">Escalas</th>
                  <th class="align-middle">Destino</th>
                  <th class="align-middle">Salida</th>
                  <th class="align-middle">Llegada</th>
              </tr>
        </thead>
        <tbody class="text-center align-middle">
          @foreach($flights as $flight)
            <tr>
              <td class="align-middle">{{ $flight->precio_economy }}</td>
              <td class="align-middle">{{ $flight->precio_bussiness }}</td>
              <td class="align-middle">{{ $flight->precio_premium }}</td>
              <td class="align-middle">{{ $flight->escalas }}</td>
              <td class="align-middle">{{ $flight->destiny->ciudad }}</td>
              <td class="align-middle">{{ $flight->fecha_despegue }}</td>
              <td class="align-middle">{{ $flight->fecha_aterrizaje }}</td>
              <td class="align-middle">
              <center>
                <button type="button" class="btn btn-primary btn-galaxy" data-toggle="modal" data-target="#modal-flight-update-{{ $flight->id }}">
                  Editar
                </button>
              </center>
              @include('modules.flightReservation.flight.update') 
              </td>
              <td class="align-middle">
              <form action="/admin/flight/{{ $flight->id }}" method="post">
                @method('DELETE')
                @csrf
                <input type="hidden" name="actual_user_id" id="actual_user_id" value="{{ Crypt::encrypt(Auth::user()->id) }}">
              <center>
                <button type="submit" class="btn btn-danger btn-galaxy" id="flight" name="flight"><span>Eliminar</span> </button>
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

