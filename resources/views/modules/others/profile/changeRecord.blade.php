<div class="form">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark text-center">
                <tr>
                    <th class="align-middle">Nombre de Usuario</th>
                    <th class="align-middle">Acción</th>
                    <th class="align-middle">Realizada</th>
                </tr>
            </thead>
            <tbody class="text-center align-middle text-light">
                @if (count($histories) != 0)
                    @foreach ($histories as $history)
                        <tr>
                            <td class="align-middle">{{ $user->name }}</td>
                            <td class="align-middle">{{ $history->action }}</td>
                            <td class="align-middle">{{ $history->created_at }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="align-middle"> No hay registro </td>
                        <td class="align-middle"> No hay registro </td>
                        <td class="align-middle"> No hay registro </td>
                    </tr>
                @endif  
            </tbody>
        </table> 
    </div>
</div>