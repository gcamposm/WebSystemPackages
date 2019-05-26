<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
     <li class="nav-item ml-auto mx-auto">
          <a class="nav-link btn-galaxy active" id="pills-vueloOne-tab" data-toggle="pill" href="#pills-vueloOne" role="tab" aria-controls="pills-vueloOne" aria-selected="true">
               Vuelo + Alojamiento
          </a>
     </li>
     <li class="nav-item ml-auto mx-auto">
          <a class="nav-link btn-galaxy" id="pills-vueloTwo-tab" data-toggle="pill" href="#pills-vueloTwo" role="tab" aria-controls="pills-vueloTwo" aria-selected="false">
               Vuelo + Vehículo
          </a>
     </li>
     <li class="nav-item ml-auto mx-auto">
          <a class="nav-link btn-galaxy" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
               Vuelo + Alojamiento + Vehículo
          </a>
     </li>
</ul>
<div class="tab-content" id="pills-tabContent">
     <div class="tab-pane fade show active" id="pills-vueloOne" role="tabpanel" aria-labelledby="pills-vueloOne-tab">
          @include('modules.others.package.formPackageOne')
     </div>
     <div class="tab-pane fade" id="pills-vueloTwo" role="tabpanel" aria-labelledby="pills-vueloTwo-tab">
          @include('modules.others.package.formPackageTwo')
     </div>
     <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
          @include('modules.others.package.formPackageThree')
     </div>
</div>

<script>
  addEventListener('load',inicio,false);

  function inicio()
  {
    document.getElementById('fecha-recogida').addEventListener('change',cambioDevolucion,false);
  }

  function cambioDevolucion()
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