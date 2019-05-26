<div class="form">
  @if (count($sell->insuranceReservation) != 0)
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark text-center">
          <tr>
              <th class="align-middle">Código de la compra</th>
              <th class="align-middle">Fecha de compra</th>
              <th class="align-middle">Monto pagado</th>
              <th class="align-middle">Servicio Médico</th>
              <th class="align-middle">Servicio I</th>
              <th class="align-middle">Servicio II</th>
              <th class="align-middle">Tipo</th>
          </tr>
        </thead>
        <tbody class="text-center align-middle text-light">   
          @foreach ($sell->insuranceReservation as $insuranceReservation)
            <tr>
              <td class="align-middle">{{ $sell->source }}</td>
              <td class="align-middle">{{ $insuranceReservation->created_at }}</td>
              <td class="align-middle">{{ $insuranceReservation->monto_total }}</td>
              <td class="align-middle">{{ $insuranceReservation->insurance->medicalService }}</td>
              <td class="align-middle">{{ $insuranceReservation->insurance->service2 }}</td>
              <td class="align-middle">{{ $insuranceReservation->insurance->service3 }}</td>
              <td class="align-middle">{{ $insuranceReservation->insurance->groupsize }}</td>
            </tr>
          @endforeach
        </tbody>
      </table> 
      </center>
    </div>
  @endif
</div>

