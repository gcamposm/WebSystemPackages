<!-- Modal -->
<form action="/admin/vehicle/{{ $vehicle->id }}" method="post">
  @method('PATCH')
  @csrf
  <div class="modal text-dark fade" id="modal-vehicle-update-{{ $vehicle->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Editando Vehículo Patente: {{$vehicle->patente}}</h5>
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
                    <option value="{{ $vehicle->zone->id }}" selected>
                      {{ $vehicle->zone->nombre }}
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
            for="vehicle_provider_id" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Proveedor') }}
            </label>

            <div class="col-md-6">
                <select 
                  id="vehicle_provider_id" 
                  name="vehicle_provider_id" 
                  class="form-control selectpicker custom-select" 
                  required
                  >
                    <option value="{{ $vehicle->vehicleProvider->id }}" selected>
                      {{ $vehicle->vehicleProvider->politica_combustible }}
                    </option>
                    @foreach ($vehicleProviders as $vehicleProvider)
                    <option value="{{ $vehicleProvider->id }}">
                      {{ $vehicleProvider->politica_combustible }}
                    </option>
                    @endforeach
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="patente" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Patente') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="patente" 
                  name="patente" 
                  type="text" 
                  class="form-control"  
                  value="{{ $vehicle->patente }}" 
                  required 
                  autofocus
                >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="marca" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Marca') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="marca"
                  name="marca"
                  type="text" 
                  class="form-control" 
                  value="{{ $vehicle->marca }}" 
                  required 
                  autofocus
                  >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="tipo" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Tipo de Vehículo') }}
            </label>

            <div class="col-md-6">
                <select 
                  id="tipo" 
                  name="tipo"
                  class="form-control selectpicker custom-select" 
                  required
                  autofocus
                  >
                    <option value="{{ $vehicle->tipo }}" selected>
                        {{ $vehicle->tipo }}
                    </option>
                    <option value="Automovil">
                            Automóvil
                    </option>
                    <option value="Camioneta">
                            Camioneta
                    </option>
                    <option value="Minivan">
                            Minivan
                    </option>
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="gamma" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Gamma') }}
            </label>

            <div class="col-md-6">
                <select 
                  id="gamma" 
                  name="gamma"
                  class="form-control selectpicker custom-select" 
                  required 
                  autofocus
                  >
                    <option value="{{ $vehicle->gamma }}" selected>
                      {{ $vehicle->gamma }}
                    </option>
                    <option value="Baja">
                      Baja
                    </option>
                    <option value="Media">
                      Media
                    </option>
                    <option value="Alta">
                      Alta
                    </option>
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="transmision" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Transmisión') }}
            </label>

            <div class="col-md-6">
              <select 
                  id="transmision" 
                  name="transmision"
                  class="form-control selectpicker custom-select" 
                  required 
                  autofocus
                  >
                  <option value="{{ $vehicle->transmision }}" selected>
                    {{ $vehicle->transmision }}
                  </option>
                  <option value="Manual">
                    Manual
                  </option>
                  <option value="Automática">
                    Automática
                  </option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="combustible" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Tipo de Combustible') }}
            </label>

            <div class="col-md-6">
              <select 
                  id="combustible" 
                  name="combustible"
                  class="form-control selectpicker custom-select" 
                  required 
                  autofocus
                  >
                  <option value="{{ $vehicle->combustible }}" selected>
                    {{ $vehicle->combustible }}
                  </option>
                  <option value="Bencina">
                    Bencina
                  </option>
                  <option value="Petróleo">
                    Petróleo
                  </option>
              </select>
            </div>
          </div>

          <div class="form-group row">
              <label 
              for="n_pasajeros" 
              class="col-sm-4 col-form-label text-md-right"
              >
                {{ __('Nº de Pasajeros') }}
              </label>

              <div class="col-md-6">
                  <input 
                    id="n_pasajeros" 
                    name="n_pasajeros" 
                    type="number" 
                    class="form-control"  
                    value="{{ $vehicle->n_pasajeros }}"
                    min="1"
                    max="8"
                    required 
                    autofocus
                  >
              </div>
            </div>

          <div class="form-group row">
            <label 
            for="equipaje_g" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Equipaje Grande') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="equipaje_g" 
                  name="equipaje_g" 
                  type="number"
                  min="1"
                  max="5"
                  class="form-control"  
                  value="{{ $vehicle->equipaje_g }}" 
                  required 
                  autofocus
                >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="equipaje_p" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Equipaje pequeño') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="equipaje_p" 
                  name="equipaje_p" 
                  type="number" 
                  class="form-control"  
                  value="{{ $vehicle->equipaje_p }}" 
                  min="1"
                  max="5"
                  required 
                  autofocus
                >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="n_kilometraje" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Kilometraje') }}
            </label>

            <div class="col-md-6">
                <input 
                  id="n_kilometraje" 
                  name="n_kilometraje" 
                  type="number"
                  min="0"
                  class="form-control"  
                  value="{{ $vehicle->n_kilometraje }}" 
                  required 
                  autofocus
                >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="precio" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Precio/Hora') }}
            </label>

            <div class="col-md-6">
              <input 
                id="precio" 
                name="precio" 
                type="number"
                min="0"
                class="form-control"  
                value="{{ $vehicle->precio}}" 
                required 
                autofocus
              >
            </div>
          </div>

          <div class="form-group row">
            <label 
            for="aire_acondicionado" 
            class="col-sm-4 col-form-label text-md-right"
            >
              {{ __('Aire Acondicionado') }}
            </label>

            <div class="col-md-6">
              <select 
                  id="aire_acondicionado"
                  name="aire_acondicionado"
                  class="form-control selectpicker custom-select" 
                  required 
                  autofocus
                  >
                  <option value="{{ $vehicle->aire_acondicionado }}" selected>
                    {{ $vehicle->aire_acondicionado }}
                  </option>
                  <option value="Sí">
                    Sí
                  </option>
                  <option value="No">
                    No
                  </option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
                <input 
                  id="n_puertas" 
                  name="n_puertas" 
                  type="hidden" 
                  value=4
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
