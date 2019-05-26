  <div class="form">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark text-center">
              <tr>
                  <th class="align-middle">Nombre</th>
                  <th class="align-middle">País</th>
                  <th class="align-middle">Dirección</th>
                  <th class="align-middle">Estrellas</th>
                  <th class="align-middle">Valoración</th>
                  <th class="align-middle">Capacidad</th>
                  <th class="align-middle"></th>
                  <th class="align-middle"></th>
              </tr>
        </thead>
        <tbody class="text-center align-middle">
          @foreach($hotels as $hotel)
            <tr>
              <td class="align-middle">{{$hotel->nombre}}</td>
              <td class="align-middle">{{$hotel->pais}}</td>
              <td class="align-middle">{{$hotel->direccion}}</td>
              <td class="align-middle">{{$hotel->estrellas}}</td>
              <td class="align-middle">{{$hotel->valoracion}}</td>
              <td class="align-middle">{{$hotel->capacidad}}</td>
              <td class="align-middle">
              <center>
                <button type="button" class="btn btn-primary btn-galaxy" data-toggle="modal" data-target="#modal-hotel-update-{{ $hotel->id }}">
                  Editar
                </button>
              </center>
                @include('modules.housingReservation.hotel.update') 
              </td>
              <td class="align-middle">
              <form action="/admin/hotel/{{ $hotel->id }}" method="post">
                @method('DELETE')
                @csrf
                <input type="hidden" name="actual_user_id" id="actual_user_id" value="{{ Crypt::encrypt(Auth::user()->id) }}">
              <center>
                <button type="submit" class="btn btn-danger btn-galaxy" id="hotel" name="hotel"><span>Eliminar</span> </button>
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

