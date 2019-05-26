<div class="form">
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark text-center">
            <tr>
                <th class="align-middle">Hotel</th>
                <th class="align-middle">Destino</th>
                <th class="align-middle">Duración</th>
                <th class="align-middle">Patente</th>
                <th class="align-middle">Marca</th>
                <th class="align-middle">Tipo</th>
                <th class="align-middle"></th>
                <th class="align-middle"></th>
            </tr>
      </thead>
      <tbody class="text-center align-middle">
        @foreach($packages as $package)
          <tr>
                @if ($package->hotel != null)
                    <td class="align-middle">{{ $package->hotel->nombre }}</td>
                    <td class="align-middle">{{ $package->hotel->ciudad }}</td>
                @else
                    <td class="align-middle">No aplica</td>
                    <td class="align-middle">No aplica</td>
                @endif
                <td class="align-middle">{{ $package->getDias() }}</td>
                @if ($package->vehicle != null)
                    <td class="align-middle">{{ $package->vehicle->patente }}</td>
                    <td class="align-middle">{{ $package->vehicle->marca }}</td>
                    <td class="align-middle">{{ $package->vehicle->tipo }}</td> 
                @else 
                    <td class="align-middle">No aplica</td>
                    <td class="align-middle">No aplica</td>
                    <td class="align-middle">No aplica</td>
                @endif
            <td class="align-middle">
            <center>
              <button type="button" class="btn btn-primary btn-galaxy" data-toggle="modal" data-target="#modal-package-update-{{ $package->id }}">
                Editar
              </button>
            </center>
              @include('modules.others.package.update') 
            </td>
            <td class="align-middle">
            <form action="/admin/package/{{ $package->id }}" method="post">
              @method('DELETE')
              @csrf
            <center>
              <button type="submit" class="btn btn-danger btn-galaxy" id="package_id" name="package_id"><span>Eliminar</span> </button>
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



