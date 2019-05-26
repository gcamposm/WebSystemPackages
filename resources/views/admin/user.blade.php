<div class="form">
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark text-center">
            <tr>
                <th class="align-middle">Nombre</th>
                <th class="align-middle">Email</th>
                <th class="align-middle">Creado</th>
                <th class="align-middle">Administrador</th>
                <th class="align-middle"></th>
                <th class="align-middle"></th>
                <th class="align-middle"></th>
            </tr>
      </thead>
      <tbody class="text-center align-middle">
        @foreach($users as $user)
          <tr>
            <td class="align-middle">{{ $user->name }}</td>
            <td class="align-middle">{{ $user->email }}</td>
            <td class="align-middle">{{ $user->created_at }}</td>
            @if ( $user->is_admin == 0)
                <td class="align-middle">No</td>
                <td class="align-middle">
                <form action="{{ route('admin.upuser',[Crypt::encrypt($user->id) ])}}" method="post">
                @method('PATCH')
                @csrf
                    <input type="hidden" name="actual_user_id" id="actual_user_id" value="{{ Crypt::encrypt(Auth::user()->id) }}">
                    <center>
                        <button type="submit" class="btn btn-success btn-galaxy" id="user_id" name="user_id"><span>Ascender a Admin</span> </button>
                    </center>
                </form>
            </td>
            @else 
                <td class="align-middle">Sí</td>
                <td class="align-middle">
                <form action="{{ route('admin.downuser',[Crypt::encrypt($user->id) ])}}" method="post">
                @method('PATCH')
                @csrf
                    <input type="hidden" name="actual_user_id" id="actual_user_id" value="{{ Crypt::encrypt(Auth::user()->id) }}">
                    <center>
                        <button type="submit" class="btn btn-primary btn-galaxy" id="user_id" name="user_id"><span>Descender de Admin</span> </button>
                    </center>
                </form>
            </td>
            @endif
            <td class="align-middle">
                <form action="{{ route('history.show',[Crypt::encrypt($user->id) ])}}" method="get">
                    <input type="hidden" name="actual_user_id" id="actual_user_id" value="{{ Crypt::encrypt(Auth::user()->id) }}">
                    <center>
                        <button type="submit" class="btn btn-info btn-galaxy" id="user_id" name="user_id"><span>Ver Historial</span> </button>
                    </center>
                </form>
            </td>
            <td class="align-middle">
                <form action="{{ route('admin.deleteuser',[Crypt::encrypt($user->id) ])}}" method="post">
                @method('DELETE')
                @csrf
                    <input type="hidden" name="actual_user_id" id="actual_user_id" value="{{ Crypt::encrypt(Auth::user()->id) }}">
                    <center>
                        <button type="submit" class="btn btn-danger btn-galaxy" id="user_id" name="user_id"><span>Eliminar</span> </button>
                    </center>
                </form>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table> 
  </div>
</div>

