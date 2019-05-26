<form action="/vehicle" method="get">

     <div class="card buy-card flex-fill">
          <div class="card-body buy-card-body">
               <!-- Línea 1 -->
               <div class="row justify-content-center">
                    <div class="col-12">
                         <center>
                              <!-- Input Zona -->
                              <label for="zone">
                                   <span> 
                                        Zona
                                   </span>
                              </label>
                         </center>
                         <div class="form-group">
                              <select 
                                   id="zone" 
                                   name="zone" 
                                   class="form-control selectpicker custom-select" 
                                   required>
                                   <option selected disabled>
                                        Seleccione su zona destino
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
                              <!-- Input Fecha de recogida -->
                              <label for="fecha-recogida">
                                   <span> 
                                        Fecha de recogida
                                   </span>
                              </label>
                              <div class="input-group">
                                   <input 
                                   id="fecha-recogida" 
                                   name="fecha-recogida" 
                                   type="date"
                                   class="form-control"
                                   style="color:black;"
                                   {{-- required --}}
                                   >
                                   <span class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                   </span>
                              </div>
                         </center>
                    </div>
                    <div class="col">
                         <center>
                              <!-- Input Fecha de devolución -->
                              <label for="fecha-devolucion">
                                   <span> 
                                        Fecha de devolución
                                   </span>
                              </label>
                              <div class="input-group">
                                   <input 
                                   id="fecha-devolucion"
                                   name="fecha-devolucion"
                                   type="date" 
                                   class="form-control"
                                   style="color:black;"
                                   {{-- required --}}
                                   >
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
                    <div class="col-12">
                         <!-- Input Pasajeros -->
                         <center>
                              <label for="pasajeros">
                                   <span> 
                                        Pasajeros 
                                   </span>
                              </label>
                         </center>
                         <input
                         class="form-control"
                         id="pasajeros"
                         name="pasajeros"
                         type="number"
                         min="1"
                         max="8"
                         placeholder="Número de pasajeros"
                         style="width:100%;" 
                         required>
                    </div>
               </div>
               </br>
               <center>
                    <button type="submit" class="btn btn-galaxy wow fadeInUp">Encuentre su vehículo</button> 
               </center>
          </div> 
     </div>

</form>

<script>
  addEventListener('load',inicioVehicle,false);

  function inicioVehicle()
  {
    document.getElementById('fecha-recogida').addEventListener('change',cambioDevolucionVehicle,false);
  }

  function cambioDevolucionVehicle()
  {
     var fecha = document.getElementById("fecha-recogida").value;
     
    document.getElementById('fecha-recogida').innerHTML=document.getElementById('fecha-recogida').value;
    document.getElementById("fecha-devolucion").setAttribute("min", fecha);
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
     document.getElementById("fecha-recogida").setAttribute("min", today);
     document.getElementById("fecha-devolucion").setAttribute("min", today);
</script>