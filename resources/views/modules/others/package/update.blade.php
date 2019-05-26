<!-- Modal -->
<form action="/admin/package/{{ $package->id }}" method="post">
  @method('PATCH')
  @csrf
  <div class="modal text-dark fade" id="modal-package-update-{{ $package->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Editando Paquete ID: {{$package->id}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label 
            for="hotel_id" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Hotel') }}
            </label>

            <div class="col-md-6">
                <select 
                  id="hotel_id" 
                  name="hotel_id" 
                  class="form-control selectpicker custom-select"
                  >
                    @if ($package->hotel != null)
                        <option value="{{ $package->hotel->id }}" selected>
                      {{ $package->hotel->nombre }}
                    </option>  
                    @endif
        
                    @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->id }}">
                      {{ $hotel->nombre }}
                    </option>
                    @endforeach
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="vehicle_id" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Vehículo') }}
            </label>

            <div class="col-md-6">
                <select 
                  id="vehicle_id" 
                  name="vehicle_id" 
                  class="form-control selectpicker custom-select"
                  >
                    @if ($package->vehicle != null)
                        <option value="{{ $package->vehicle->id }}" selected>
                        {{ $package->vehicle->patente }}
                        </option>
                    @endif
                    @foreach ($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">
                      {{ $vehicle->patente }}
                    </option>
                    @endforeach
                </select>
            </div>
          </div>

          <div class="form-group row">
              <label 
              for="type" 
              class="col-sm-4 col-form-label text-md-right"
              >
                {{ __('Tipo') }}
              </label>

              <div class="col-md-6">
                  <input 
                    id="type" 
                    name="type" 
                    type="number" 
                    class="form-control"  
                    value="{{ $package->type }}"
                    min="1"
                    max="2"
                    required 
                    autofocus
                  >
              </div>
            </div>

            <div class="form-group row">
            <label 
            for="fecha_inicio" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Fecha de Inicio') }}
            </label>

            <div class="col-md-6">
              <div class="input-group">
                  <input 
                  id="fecha_inicio"
                  name="fecha_inicio"
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
            for="fecha_fin" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Fecha de Fin') }}
            </label>

            <div class="col-md-6">
              <div class="input-group">
                  <input 
                  id="fecha_fin"
                  name="fecha_fin"
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

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-galaxy">Guardar cambios</button>
          <button type="button" class="btn btn-danger btn-galaxy" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</form>
