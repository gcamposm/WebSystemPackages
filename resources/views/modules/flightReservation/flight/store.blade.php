<!-- Modal -->
<form action="/admin/flight" method="post">
  @method('POST')
  @csrf
  <div class="modal fade text-dark" id="modal-flight-store" tabindex="-1" role="dialog" aria-labelledby="modal-flight-store-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Nuevo Vuelo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group row">
            <label 
            for="tramo1_id" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Tramo 1 - ID') }}
            </label>

            <div class="col-md-6">
                  <input 
                    id="tramo1_id" 
                    name="tramo1_id" 
                    type="number" 
                    class="form-control"
                    autofocus
                  >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="tramo2_id" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Tramo 2 - ID') }}
            </label>

              <div class="col-md-6">
                  <input 
                    id="tramo2_id" 
                    name="tramo2_id" 
                    type="number" 
                    class="form-control"
                    autofocus
                  >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="origen_id" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Origen - ID') }}
            </label>

              <div class="col-md-6">
                  <input 
                    id="origen_id" 
                    name="origen_id" 
                    type="number" 
                    class="form-control"
                    autofocus
                  >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="destiny_id" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Destino - ID') }}
            </label>

              <div class="col-md-6">
                  <input 
                    id="destiny_id" 
                    name="destiny_id" 
                    type="number" 
                    class="form-control"
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
                    class="form-control"
                    autofocus
                  >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="precio_economy" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Precio - Economy') }}
            </label>

              <div class="col-md-6">
                  <input 
                    id="precio_economy" 
                    name="precio_economy" 
                    type="number" 
                    class="form-control"
                    autofocus
                  >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="precio_bussiness" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Precio - Business') }}
            </label>

              <div class="col-md-6">
                  <input 
                    id="precio_bussiness" 
                    name="precio_bussiness" 
                    type="number" 
                    class="form-control"
                    autofocus
                  >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="precio_premium" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Precio - Premium') }}
            </label>

              <div class="col-md-6">
                  <input 
                    id="precio_premium" 
                    name="precio_premium" 
                    type="number" 
                    class="form-control"
                    autofocus
                  >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="fecha_despegue" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Fecha de Despegue') }}
            </label>

            <div class="col-md-6">
              <div class="input-group">
                  <input 
                  id="fecha_despegue"
                  name="fecha_despegue"
                  type="date"
                  class="form-control"
                  style="color:black;"
                  required>
                  <span class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                  </span>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="fecha_aterrizaje" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Fecha de Aterrizaje') }}
            </label>

            <div class="col-md-6">
              <div class="input-group">
                  <input 
                  id="fecha_aterrizaje"
                  name="fecha_aterrizaje"
                  type="date"
                  class="form-control"
                  style="color:black;"
                  required>
                  <span class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                  </span>
              </div>
            </div>
          </div>

          <input type="hidden" name="actual_user_id" id="actual_user_id" value="{{ Crypt::encrypt(Auth::user()->id) }}">

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-galaxy">Agregar Vehículo</button>
          <button type="button" class="btn btn-danger btn-galaxy" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</form>
