<!-- Modal -->
<div class="modal fade" id="modal-vehicle-reservation-{{ $roundtrip->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-vehicle-reservation-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="color: black;">
        <h5 class="modal-title" id="exampleModalCenterTitle">Destino: {{$roundtrip->vueloIda->destiny->ciudad}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" style="color: grey; background-color: white !important;">
          <div class="row">
              <div class="col-6">
              <p class="modal-text">
                  <b>Destino</b>
                  <br>
                  {{ $roundtrip->vueloIda->destiny->ciudad }}
              </p>

              <p class="modal-text">
                  <b>Ida: Fecha salida</b>
                  <br>
                  {{ $roundtrip->vueloIda->fecha_despegue }}
              </p>

              <p class="modal-text">
                  <b>Ida: Fecha de llegada</b>
                  <br>
                  {{ $roundtrip->vueloIda->fecha_aterrizaje }}
              </p>
              <p class="modal-text">
                  <b>Vuelta: Fecha salida</b>
                  <br>
                  {{ $roundtrip->vueloVuelta->fecha_despegue }}
              </p>

              <p class="modal-text">
                  <b>Vuelta: Fecha de llegada</b>
                  <br>
                  {{ $roundtrip->vueloVuelta->fecha_aterrizaje }}
              </p>
              <p class="modal-text">
                  <b>Escalas</b>
                  <br>
                  Escalas ida: {{  $roundtrip->vueloIda->escalas }}<br>
                  Escalas vuelta: {{  $roundtrip->vueloVuelta->escalas }}
              </p>
                  @if ($roundtrip->vueloIda->escalas == 2)
                      <p class="modal-text">
                          <b>Primer tramo</b>
                          <br>
                          Origen: {{ $roundtrip->vueloIda->getTramo1->origin->ciudad}}<br>
                          Destino: {{ $roundtrip->vueloIda->getTramo1->destiny->ciudad}}<br>
                          Fecha Salida: {{ $roundtrip->vueloIda->getTramo1->fecha_despegue}}
                      </p>
                      <p class="modal-text">
                          <b>Segundo tramo</b>
                          <br>
                          Origen: {{ $roundtrip->vueloIda->getTramo2->origin->ciudad}}<br>
                          Destino: {{ $roundtrip->vueloIda->getTramo2->destiny->ciudad}}<br>
                          Fecha Salida: {{ $roundtrip->vueloIda->getTramo2->fecha_despegue}}
                      </p>
                  @endif
                  @if ($roundtrip->vueloVuelta->escalas == 2)
                      <p class="modal-text">
                          <b>Primer tramo</b>
                          <br>
                          Origen: {{ $roundtrip->vueloVuelta->getTramo1->origin->ciudad}}<br>
                          Destino: {{ $roundtrip->vueloVuelta->getTramo1->destiny->ciudad}}<br>
                          Fecha Salida: {{ $roundtrip->vueloVuelta->getTramo1->fecha_despegue}}
                      </p>
                      <p class="modal-text">
                          <b>Segundo tramo</b>
                          <br>
                          Origen: {{ $roundtrip->vueloVuelta->getTramo2->origin->ciudad}}<br>
                          Destino: {{ $roundtrip->vueloVuelta->getTramo2->destiny->ciudad}}<br>
                          Fecha Salida: {{ $roundtrip->vueloVuelta->getTramo2->fecha_despegue}}
                      </p>
                  @endif

              </div>
              <div class="col-6">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                  <div class="carousel-item active">
                      <img class="d-block" src="https://picsum.photos/600/300?image=0" alt="First slide">
                  </div>
                  <div class="carousel-item">
                      <img class="d-block" src="https://picsum.photos/600/300?image=1" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                      <img class="d-block" src="https://picsum.photos/600/300?image=2" alt="Third slide">
                  </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                  </a>
              </div>
              </div>
          </div>
      </div>

      <div class="modal-footer" style="color: grey; ">
        <form action="{{ route('cart.storeRoundTrip', $roundtrip) }}" method="POST" onsubmit="return confirm('¿Esta seguro que desea agregar al carro?')">
          @method('POST')
          @csrf
          <button type="submit" class="btn btn-success btn-galaxy">
              <i class="fas fa-cart-plus" style="margin-right: 3%;"></i>Reservar Vuelo</button>
          <button type="button" class="btn btn-danger btn-galaxy" data-dismiss="modal">Volver</button>
        </form>
      </div>
    </div>
  </div>
</div>
