<!-- Modal -->
<form action="/admin/hotel" method="post">
  @method('POST')
  @csrf
  <div class="modal text-dark fade" id="modal-hotel-store" tabindex="-1" role="dialog" aria-labelledby="modal-hotel-store-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Nuevo Hotel</h5>
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
                  placeholder="Nombre del Hotel"
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
                  placeholder="País"
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
                  placeholder="Dirección"
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
                  class="form-control"
                  placeholder="Estrellas"
                  min="1"
                  max="5"
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
                  class="form-control"
                  placeholder="Valoración"
                  min="0"
                  max="10"
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
              {{ __('Capacidad del Hotel') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="capacidad" 
                  name="capacidad" 
                  type="number" 
                  class="form-control"
                  placeholder="Capacidad del Hotel"
                  min="0"
                  max="9999"
                  required 
                  autofocus
                >
            </div>
          </div>
          
          <input type="hidden" name="actual_user_id" id="actual_user_id" value="{{ Crypt::encrypt(Auth::user()->id) }}">

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Agregar Hotel</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</form>
