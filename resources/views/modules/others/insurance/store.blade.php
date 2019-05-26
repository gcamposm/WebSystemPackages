<!-- Modal -->
<form action="/admin/insurance" method="post">
  @method('POST')
  @csrf
  <div class="modal text-dark fade" id="modal-insurance-store" tabindex="-1" role="dialog" aria-labelledby="modal-insurance-store-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Nuevo Seguro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group row">
             <div class="col-md-6">
                <input 
                  id="flight_id" 
                  name="flight_id" 
                  type="hidden" 
                  class="form-control"
                  value=""
                  autofocus
                >
            </div>
          </div>

          <div class="form-group row">
             <div class="col-md-6">
                <input 
                  id="active" 
                  name="active" 
                  type="hidden" 
                  class="form-control"
                  value="No"
                  autofocus
                >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="zone_id" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Zona') }}
            </label>

            <div class="col-md-6">
                <select 
                  id="zone_id" 
                  name="zone_id" 
                  class="form-control selectpicker custom-select" 
                  required
                  >
                    <option selected disabled>
                      Seleccione una zona
                    </option>
                    @foreach ($zones as $zone)
                    <option value="{{ $zone->id }}">
                            {{ $zone->nombre }}
                    </option>
                    @endforeach
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="medicalService" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Servicio Médico') }}
            </label>

            <div class="col-md-6">
                <select 
                  id="medicalService" 
                  name="medicalService" 
                  class="form-control selectpicker custom-select" 
                  required
                  >
                    <option selected disabled>
                      Seleccione el proveedor
                    </option>
                    <option value="Normal">
                      Normal
                    </option>
                    <option value="Premium">
                      Premium
                    </option>
                    <option value="Platino">
                      Platino
                    </option>
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="service2" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Servicio I') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="service2" 
                  name="service2" 
                  type="text" 
                  class="form-control"  
                  placeholder="Servicio I"
                  required 
                  autofocus
                >
            </div>
        </div>

          <div class="form-group row">
            <label 
            for="service3" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Servicio II') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="service3" 
                  name="service3" 
                  type="text" 
                  class="form-control"  
                  placeholder="Servicio II"
                  required 
                  autofocus
                >
            </div>
        </div>

          <div class="form-group row">
            <label 
            for="groupsize" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Tipo') }}
            </label>

            <div class="col-md-6">
                <select 
                  id="groupsize" 
                  name="groupsize"
                  class="form-control selectpicker custom-select" 
                  required
                  autofocus
                  >
                    <option selected disabled>
                      Seleccione el tipo de seguro
                    </option>
                    <option value="Individual">
                        Individual
                    </option>
                    <option value="Grupo">
                        Grupo
                    </option>
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="price" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Precio') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="price" 
                  name="price" 
                  type="number" 
                  class="form-control"  
                  placeholder="Precio"
                  required 
                  autofocus
                >
            </div>
        </div>

        <div class="form-group row">
             <div class="col-md-6">
                <input 
                  id="avgage" 
                  name="avgage" 
                  type="hidden" 
                  class="form-control"
                  value=25
                  autofocus
                >
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-galaxy">Agregar Seguro</button>
          <button type="button" class="btn btn-danger btn-galaxy" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</form>
