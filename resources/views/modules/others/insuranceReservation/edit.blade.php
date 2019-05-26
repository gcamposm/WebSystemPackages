<div class="form">
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark text-center">
            <tr>
                <th class="align-middle">Código Venta</th>
                <th class="align-middle">Usuario</th>
                <th class="align-middle">Monto Cancelado</th>
                <th class="align-middle">ID del Seguro</th>
                <th class="align-middle">Reservado</th>
                <th class="align-middle"></th>
            </tr>
      </thead>
      <tbody class="text-center align-middle">
        @foreach($insuranceReservations as $insuranceReservation)
          <tr>
            <td class="align-middle">{{$insuranceReservation->sell->source}}</td>
            <td class="align-middle">{{$insuranceReservation->sell->user->name}}</td>
            <td class="align-middle">{{$insuranceReservation->monto_total}}</td>
            <td class="align-middle">{{$insuranceReservation->insurance_id}}</td>
            <td class="align-middle">{{$insuranceReservation->created_at}}</td>
            <td class="align-middle">
            <form action="/admin/insuranceReservation/{{ $insuranceReservation->id }}" method="post">
              @method('DELETE')
              @csrf
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

