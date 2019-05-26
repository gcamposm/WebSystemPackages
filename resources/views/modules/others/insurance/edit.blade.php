<div class="form">
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark text-center">
            <tr>
                <th class="align-middle">Zona</th>
                <th class="align-middle">Servicio Médico</th>
                <th class="align-middle">Servicio I</th>
                <th class="align-middle">Servicio II</th>
                <th class="align-middle">Tipo</th>
                <th class="align-middle">Precio</th>
                <th class="align-middle">Creado</th>
                <th class="align-middle">Actualizado</th>
                <th class="align-middle"></th>
                <th class="align-middle"></th>
            </tr>
      </thead>
      <tbody class="text-center align-middle">
        @foreach($insurances as $insurance)
          <tr>
            <td class="align-middle">{{$insurance->zone->nombre}}</td>
            <td class="align-middle">{{$insurance->medicalService}}</td>
            <td class="align-middle">{{$insurance->service2}}</td>
            <td class="align-middle">{{$insurance->service3}}</td>
            <td class="align-middle">{{$insurance->groupsize}}</td>
            <td class="align-middle">{{$insurance->price}}</td>
            <td class="align-middle">{{$insurance->created_at}}</td>
            <td class="align-middle">{{$insurance->updated_at}}</td>
            <td class="align-middle">
            <center>
              <button type="button" class="btn btn-primary btn-galaxy" data-toggle="modal" data-target="#modal-insurance-update-{{ $insurance->id }}">
                Editar
              </button>
            </center>
              @include('modules.others.insurance.update') 
            </td>
            <td class="align-middle">
            <form action="/admin/insurance/{{ $insurance->id }}" method="post">
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

