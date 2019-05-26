<ul class="nav nav-pills" id="pills-tab" role="tablist">
     <li class="nav-item ml-auto mx-auto">
          <a class="nav-link btn-galaxy active" id="pills-insuranceOne-tab" data-toggle="pill" href="#pills-insuranceOne" role="tab" aria-controls="pills-insuranceOne" aria-selected="true">
               Ida y vuelta
          </a>
     </li>
     <li class="nav-item ml-auto mx-auto">
          <a class="nav-link btn-galaxy" id="pills-insuranceTwo-tab" data-toggle="pill" href="#pills-insuranceTwo" role="tab" aria-controls="pills-insuranceTwo" aria-selected="false">
               Sólo ida
          </a>
     </li>
</ul>
<div class="tab-content" id="pills-tabContent">
     <div class="tab-pane fade show active" id="pills-insuranceOne" role="tabpanel" aria-labelledby="pills-insuranceOne-tab">
          @include('modules.others.insurance.formInsuranceOne')
     </div>
     <div class="tab-pane fade" id="pills-insuranceTwo" role="tabpanel" aria-labelledby="pills-insuranceTwo-tab">
          @include('modules.others.insurance.formInsuranceTwo')
     </div>
</div>
