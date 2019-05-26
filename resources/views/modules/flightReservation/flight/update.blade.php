<!-- Modal -->
<form action="/admin/flight/{{ $flight->id }}" method="post">
  @method('PATCH')
  @csrf
  <div class="modal fade text-dark" id="modal-flight-update-{{ $flight->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Editando Vuelo ID: {{$flight->id}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label 
            for="precio_economy" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Precio Economy') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="precio_economy" 
                  name="precio_economy" 
                  type="number"
                  min="0"
                  class="form-control"  
                  value="{{ $flight->precio_economy }}" 
                  required 
                  autofocus
                >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="precio_bussiness" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Precio Business') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="precio_bussiness" 
                  name="precio_bussiness" 
                  type="number"
                  min="0"
                  class="form-control"  
                  value="{{ $flight->precio_bussiness }}" 
                  required 
                  autofocus
                >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="precio_premium" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Precio Premium') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="precio_premium" 
                  name="precio_premium" 
                  type="number"
                  min="0"
                  class="form-control"  
                  value="{{ $flight->precio_premium }}" 
                  required 
                  autofocus
                >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="escalas" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Escalas') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="escalas" 
                  name="escalas" 
                  type="number"
                  min="1"
                  max="2"
                  class="form-control"  
                  value="{{ $flight->escalas }}" 
                  required 
                  autofocus
                >
            </div>
          </div>

          <input type="hidden" name="actual_user_id" id="actual_user_id" value="{{ Crypt::encrypt(Auth::user()->id) }}">
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Guardar cambios</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</form>
