<div class="form">
  @if (count($sell->flightSellDetail) != 0)
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark text-center">
        <tr>
            <th class="align-middle">Tipo de Vuelo</th>
            <th class="align-middle">Pasajeros</th>
            <th class="align-middle">Origen</th>
            <th class="align-middle">Destino</th>
            <th class="align-middle">Número de Escalas</th>
            <th class="align-middle">Cabina</th>
        </tr>
        </thead>
        <tbody class="text-center align-middle text-light">   
          @foreach ($sell->flightSellDetail as $flightSellDetail)
            <tr>
                @if ($flightSellDetail->flight_id == null)
                    <td class="align-middle">Ida y Vuelta</td> 
                    <td class="align-middle">{{ $flightSellDetail->cantidad}}</td>
                    <td class="align-middle">{{ $flightSellDetail->roundtrip->vueloIda->origin->nombre }}</td>
                    <td class="align-middle">{{ $flightSellDetail->roundtrip->vueloIda->destiny->nombre  }}</td>
                    <td class="align-middle">Ida:{{ $flightSellDetail->roundtrip->vueloIda->escalas }} Vuelta:{{ $flightSellDetail->roundtrip->vueloVuelta->escalas }}</td>
                    <td class="align-middle">{{ $flightSellDetail->tipo }}</td>
                @else
                    <td class="align-middle">Sólo ida</td>
                    <td class="align-middle">{{ $flightSellDetail->cantidad }}</td>
                    <td class="align-middle">{{ $flightSellDetail->flight->origin->nombre }}</td>
                    <td class="align-middle">{{ $flightSellDetail->flight->destiny->nombre }}</td>
                    <td class="align-middle">{{ $flightSellDetail->flight->escalas }}</td>
                    <td class="align-middle">{{ $flightSellDetail->tipo }}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
      </table> 
    </div>
  @endif
</div>

