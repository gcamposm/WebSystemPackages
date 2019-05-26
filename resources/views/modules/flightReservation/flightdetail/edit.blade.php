<div class="form">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark text-center">
        <tr>
            <th class="align-middle">Nombre de Usuario</th>
            <th class="align-middle">Venta Asociada</th>
            <th class="align-middle">Tipo de Vuelo</th>
            <th class="align-middle">Pasajeros</th>
            <th class="align-middle">Origen</th>
            <th class="align-middle">Destino</th>
            <th class="align-middle">Número de Escalas</th>
            <th class="align-middle">Cabina</th>
            <th class="align-middle"></th>
        </tr>
        </thead>
        <tbody class="text-center align-middle text-light">   
            @foreach ($flightSellDetails as $flightSellDetail)
            <tr>
                @if ($flightSellDetail->flight_id == null)
                    <td class="align-middle">{{ $flightSellDetail->sell->user->name }}</td> 
                    <td class="align-middle">{{ $flightSellDetail->sell->source }}</td> 
                    <td class="align-middle">Ida y Vuelta</td> 
                    <td class="align-middle">{{ $flightSellDetail->cantidad}}</td>
                    <td class="align-middle">{{ $flightSellDetail->roundtrip->vueloIda->origin->nombre }}</td>
                    <td class="align-middle">{{ $flightSellDetail->roundtrip->vueloIda->destiny->nombre  }}</td>
                    <td class="align-middle">Ida:{{ $flightSellDetail->roundtrip->vueloIda->escalas }} Vuelta:{{ $flightSellDetail->roundtrip->vueloVuelta->escalas }}</td>
                    <td class="align-middle">{{ $flightSellDetail->tipo }}</td>
                    <td class="align-middle">
                        <form action="/admin/flightSellDetail/{{ $flightSellDetail->id }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="actual_user_id" id="actual_user_id" value="{{ Crypt::encrypt(Auth::user()->id) }}">
                        <center>
                        <button type="submit" class="btn btn-danger btn-galaxy" id="vehiculo_id" name="vehiculo_id"><span>Eliminar</span> </button>
                        </center>
                        </form>
                    </td>
                @else
                    <td class="align-middle">{{ $flightSellDetail->sell->user->name }}</td> 
                    <td class="align-middle">{{ $flightSellDetail->sell->source }}</td> 
                    <td class="align-middle">Sólo ida</td>
                    <td class="align-middle">{{ $flightSellDetail->cantidad }}</td>
                    <td class="align-middle">{{ $flightSellDetail->flight->origin->nombre }}</td>
                    <td class="align-middle">{{ $flightSellDetail->flight->destiny->nombre }}</td>
                    <td class="align-middle">{{ $flightSellDetail->flight->escalas }}</td>
                    <td class="align-middle">{{ $flightSellDetail->tipo }}</td>
                    <td class="align-middle">
                        <form action="/admin/flightSellDetail/{{ $flightSellDetail->id }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="actual_user_id" id="actual_user_id" value="{{ Crypt::encrypt(Auth::user()->id) }}">
                        <center>
                        <button type="submit" class="btn btn-danger btn-galaxy" id="vehiculo_id" name="vehiculo_id"><span>Eliminar</span> </button>
                        </center>
                        </form>
                    </td>
                @endif
            </tr>
            @endforeach
        </tbody>
        </table> 
    </div>
</div>

