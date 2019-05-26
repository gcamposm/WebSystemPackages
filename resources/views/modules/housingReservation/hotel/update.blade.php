<!-- Modal -->
<form action="/admin/hotel/{{ $hotel->id }}" method="post">
  @method('PATCH')
  @csrf
  <div class="modal text-dark fade" id="modal-hotel-update-{{ $hotel->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-hotel-edit-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Editando el Hotel: {{$hotel->nombre}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label 
            for="nombre" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Nombre') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="nombre" 
                  name="nombre" 
                  type="text" 
                  class="form-control"  
                  value="{{ $hotel->nombre }}" 
                  required 
                  autofocus
                >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="pais" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('País') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="pais" 
                  name="pais" 
                  type="text" 
                  class="form-control"  
                  value="{{ $hotel->pais }}" 
                  required 
                  autofocus
                >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="direccion" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Dirección') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="direccion" 
                  name="direccion" 
                  type="text" 
                  class="form-control"  
                  value="{{ $hotel->direccion }}" 
                  required 
                  autofocus
                >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="estrellas" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Estrellas') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="estrellas" 
                  name="estrellas" 
                  type="text" 
                  class="form-control"  
                  value="{{ $hotel->estrellas }}" 
                  required 
                  autofocus
                >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="estrellas" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Estrellas') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="estrellas" 
                  name="estrellas" 
                  type="number"
                  min="1"
                  max="5"
                  class="form-control"  
                  value="{{ $hotel->estrellas }}" 
                  required 
                  autofocus
                >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="valoracion" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Valoración') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="valoracion" 
                  name="valoracion" 
                  type="number"
                  min="0"
                  max="10"
                  class="form-control"  
                  value="{{ $hotel->valoracion }}" 
                  required 
                  autofocus
                >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="capacidad" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Capacidad') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="capacidad" 
                  name="capacidad" 
                  type="number"
                  min="0"
                  max="9999"
                  class="form-control"  
                  value="{{ $hotel->capacidad }}" 
                  required 
                  autofocus
                >
            </div>
          </div>

          <input type="hidden" name="actual_user_id" id="actual_user_id" value="{{ Crypt::encrypt(Auth::user()->id) }}">

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-galaxy">Guardar cambios</button>
          <button type="button" class="btn btn-danger btn-galaxy" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</form>
