<form action="/hotel" method="get">

     <div class="card buy-card flex-fill">
          <div class="card-body buy-card-body">
               <!-- Línea 1 -->
               <div class="row justify-content-center">
                    <div class="col-12">
                         <!-- Input Destino -->
                         <center>
                              <label for="reserva-vehiculo-zona">
                                   <span> 
                                        Destino
                                   </span>
                              </label>
                         </center>
                         <div class="form-group">
                              <select 
                                   id="zona_id" 
                                   name="zona_id" 
                                   class="form-control selectpicker custom-select" 
                                   required>
                                   <option selected disabled>
                                        Seleccione su destino
                                   </option>
                                   @foreach ($cities as $city)
                                   <option value="{{ $city->id }}">
                                        {{ $city->nombre }}
                                   </option>
                                   @endforeach
                              </select>
                         </div>
                    </div>
               </div>

               <!-- Línea 2 -->
               <div class="row justify-content-center">
                    <div class="col">
                         <center>
                              <!-- Input Entrada -->
                              <label for="fecha-entrada-housing">
                                   <span> 
                                        Entrada
                                   </span>
                              </label>
                              <div class="input-group">
                                   <input 
                                   type="date" 
                                   id="fecha-entrada-housing"
                                   name="fecha-entrada-housing"
                                   class="form-control"
                                   placeholder="Introduce una fecha"
                                   required>
                                   <span class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                   </span>
                              </div>
                         </center>
                    </div>
                    <div class="col">
                         <center>
                              <!-- Input Salida -->
                              <label for="fecha-salida-housing">
                                   <span> 
                                        Salida
                                   </span>
                              </label>
                              <div class="input-group">
                                   <input 
                                   id="fecha-salida-housing"
                                   name="fecha-salida-housing"
                                   type="date" 
                                   class="form-control"
                                   style="color:black;"
                                   min="2019/02/05"
                                   required>
                                   <span class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                   </span>
                              </div>
                         </center>
                    </div>
               </div>
               </br>
               <!-- Línea 3 -->
               <div class="row justify-content-center">
                    <div class="col">
                         <!-- Input Habitaciones -->
                         <center>
                              <label for="habitaciones">
                                   <span> 
                                        Habitaciones 
                                   </span>
                              </label>
                         </center>
                         <input
                              class="form-control"
                              id="habitaciones"
                              name="habitaciones"
                              type="number"
                              min="0"
                              max="8"
                              placeholder="Número de habitaciones"
                              style="width:100%;" 
                              >
                    </div>
                    <div class="col">
                         <!-- Input Personas -->
                         <center>
                              <label for="personas">
                                   <span> 
                                        Personas 
                                   </span>
                              </label>
                         </center>
                         <input
                              class="form-control"
                              id="personas"
                              name="personas"
                              type="number"
                              min="0"
                              max="8"
                              placeholder="Número de personas"
                              style="width:100%;" 
                              >
                    </div>
               </div>
               </br>
               <center>
                    <button type="submit" class="btn btn-galaxy wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">Encuentre su alojamiento</button> 
               </center>
          </div> 
     </div>

</form>

<script>
  addEventListener('load',inicio,false);

  function inicio()
  {
    document.getElementById('fecha-entrada-housing').addEventListener('change',cambioSalida,false);
  }

  function cambioSalida()
  {
     var fecha = document.getElementById("fecha-entrada-housing").value;
     var rest = fecha.substr(0,8);
     var dayInt = parseInt(fecha.substr(8,10))+1;
     var day = dayInt.toString();
     if(dayInt < 10)
     {
          day = "0"+day;
     }
     var salida = rest + day;
    document.getElementById('fecha-entrada-housing').innerHTML=document.getElementById('fecha-entrada-housing').value;
    document.getElementById("fecha-salida-housing").setAttribute("min", salida);
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
     document.getElementById("fecha-entrada-housing").setAttribute("min", today);
     document.getElementById("fecha-salida-housing").setAttribute("min", today);
</script>