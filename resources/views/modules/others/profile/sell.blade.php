<div class="form">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark text-center">
                <tr>
                    <th class="align-middle">Código Venta</th>
                    <th class="align-middle">Monto</th>
                    <th class="align-middle">Realizada</th>
                    <th class="align-middle"></th>
                </tr>
            </thead>
            @foreach($sells as $sell)
            <tbody class="text-center text-light align-middle">
                <tr>
                    <td class="align-middle">{{ $sell->source }}</td>
                    <td class="align-middle">{{ $sell->monto_total }}</td>
                    <td class="align-middle">{{ $sell->created_at }}</td>
                    <form action="/selldetail/{{ $sell->id }}" target="_blank" method="get">
                        <td class="align-middle"><button class="btn btn-success btn-galaxy" value="{{ $sell->id }}" >Ver Detalles</button></td>
                    </form>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>

