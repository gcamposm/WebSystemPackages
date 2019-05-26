<form action="/insuranceo" method="get">
    <div class="row justify-content-center">
        <h2>¿Cuándo viajas?</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <center>
                <!-- Input fecha ida de seguro -->
                <label for="fecha-ida-insurance">
                    <span> 
                        Desde
                    </span>
                </label>
            </center>
            <div class="input-group">
                <input 
                id="fecha-ida-insurance"
                name="fecha-ida-insurance"
                type="date" 
                class="form-control"
                style="color:black;"
                required>
                <span class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </span>
            </div>
        </div>

        <div class="col">
            <center>
                <!-- Input fecha vuelta de seguro -->
                <label for="fecha-vuelta-insurance">
                    <span> 
                        Hasta
                    </span>
                </label>
            </center>
            <div class="input-group">
                <input 
                id="fecha-vuelta-insurance"
                name="fecha-vuelta-insurance"
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
    </br>
    <!-- Línea 2 -->
    <div class="row justify-content-center">
        <div class="col">
            <center>
                <!-- Input ciudad -->
                <label for="zone_id">
                    <span> 
                        ¿Dónde viajarás?
                    </span>
                </label>
                <div class="form-group">
                    <select 
                        id="zone_id" 
                        name="zone_id" 
                        class="form-control selectpicker custom-select text-center" 
                        required>
                        <option selected disabled> 
                            Seleccione el lugar destino
                        </option>
                        @foreach ($airports as $airport)
                        <option value="{{ $airport->id }}">
                            {{ $airport->ciudad }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </center>
        </div>
    </div>
    </br>
    <!-- Línea 4 -->
    <div class="row justify-content-center">
        <div class="col">
            <!-- Input tipo de seguro -->
            <center>
                <label for="tipo">
                    <span> 
                        Tipo de Seguro
                    </span>
                </label>
            </center>
            <div class="form-group">
                <select 
                    id="tipo" 
                    name="tipo" 
                    class="form-control selectpicker custom-select" 
                    required>
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

        <div class="col">
            <!-- Input edad de los pasajeros -->
            <center>
                <label for="edad">
                    <span> 
                        Edad de los pasajeros 
                    </span>
                </label>
            </center>
            <input
            class="form-control"
            id="edad"
            name="edad"
            type="number"
            min="4"
            max="100"
            placeholder="Edad promedio de los pasajeros"
            style="width: 100%; color: black !important;" 
            required>
        </div>
    </div>
    </br>
    <center>
        <button type="submit" class="btn btn-galaxy wow fadeInUp">Cotiza tu seguro</button> 
    </center>
</form>

<script>
  addEventListener('load',inicioInsurance,false);

  function inicioInsurance()
  {
    document.getElementById('fecha-ida-insurance').addEventListener('change',cambioVueltaInsurance,false);
  }

  function cambioVueltaInsurance()
  {
     var fecha = document.getElementById("fecha-ida-insurance").value;
     
    document.getElementById('fecha-ida-insurance').innerHTML=document.getElementById('fecha-ida-insurance').value;
    document.getElementById("fecha-vuelta-insurance").setAttribute("min", fecha);
  }
</script>  

<script>
     var today = new Date();
     var dd = today.getDate();
     var mm = today.getMonth()+1; //January is 0!
     var yyyy = today.getFullYear();
     if(dd<10){
          dd='0'+dd
     } 
     if(mm<10){
          mm='0'+mm
     } 

     today = yyyy+'-'+mm+'-'+dd;
     document.getElementById("fecha-ida-insurance").setAttribute("min", today);
     document.getElementById("fecha-vuelta-insurance").setAttribute("min", today);
</script>