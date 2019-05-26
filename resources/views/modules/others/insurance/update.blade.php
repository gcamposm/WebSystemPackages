<!-- Modal -->
<form action="/admin/insurance/{{ $insurance->id }}" method="post">
  @method('PATCH')
  @csrf
  <div class="modal text-dark fade" id="modal-insurance-update-{{ $insurance->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Editando Seguro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
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
                    <option value="{{ $insurance->zone->id }}" selected>
                      {{ $insurance->zone->nombre }}
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
                    <option value="{{ $insurance->medicalService }}" selected>
                      {{ $insurance->medicalService }}
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
                  value="{{ $insurance->service2 }}" 
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
                  value="{{ $insurance->service3 }}" 
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
                    <option value="{{ $insurance->groupsize }}" selected>
                        {{ $insurance->groupsize }}
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
                  value="{{ $insurance->price }}" 
                  required 
                  autofocus
                >
            </div>
        </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-galaxy">Guardar cambios</button>
          <button type="button" class="btn btn-danger btn-galaxy" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</form>
