<ul class="nav nav-pills" id="pills-tab" role="tablist">
     <li class="nav-item ml-auto mx-auto">
          <a class="nav-link btn-galaxy active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
              Sólo ida
          </a>
     </li>
     <li class="nav-item ml-auto mx-auto">
          <a class="nav-link btn-galaxy" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
               Ida y vuelta
          </a>
     </li>
</ul>
<div class="tab-content" id="pills-tabContent">
     <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          @include('modules.flightReservation.flight.formFlightOne')
     </div>
     <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          @include('modules.flightReservation.flight.formFlightTwo')
     </div>
</div>
