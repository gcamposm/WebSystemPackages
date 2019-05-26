<!-- Modal -->
<div class="modal fade" id="modal-housing-reservation-{{ $package->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-housing-reservation-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="color: black;">
        <h5 class="modal-title" id="exampleModalCenterTitle">PRECIO: $ {{$package->precio}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" style="color: grey; background-color: white !important;">
          <div class="row">
              <div class="col-6">
              <p class="modal-text">
                  <p class="modal-text">
                      <b>Hotel</b>
                      <br>
                      {{ $package->hotelroom->hotel->nombre }}
                  </p>
                  <b>Vehículo</b>
                  <br>
                  {{ $package->vehicle->marca }}
              </p>

              <p class="modal-text">
                  <b>Tipo de vehículo</b>
                  <br>
                  {{ $package->vehicle->tipo}}
              </p>
              <p class="modal-text">
                  <b>Tipo de combustible</b>
                  <br>
                  {{ $package->vehicle->combustible}}
              </p>
              <p class="modal-text">
                  <b>Precio paquete</b>
                  <br>
                  $ {{ $package->precio }}
              </p>
              <p class="modal-text">
                  <b>Escalas ida</b>
                  <br>
                  Escalas: {{ $package->flight->vueloIda->escalas }}
              </p>
              <p class="modal-text">
                  <b>Escalas vuelta</b>
                  <br>
                  Escalas: {{ $package->flight->vueloVuelta->escalas }}
              </p>
              <p class="modal-text">
                  <b>Duración</b>
                  <br>
                  {{ $package->getDias() }}
              </p>

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
        <form action="{{ route('cart.storePackage', $package) }}" method="POST" onsubmit="return confirm('¿Esta seguro que desea agregar al carro?')">
          @method('POST')
          @csrf
          <button type="submit" class="btn btn-success btn-galaxy">
              <i class="fas fa-cart-plus" style="margin-right: 3%;"></i>Reservar Paquete</button>
          <button type="button" class="btn btn-danger btn-galaxy" data-dismiss="modal">Volver</button>
        </form>
      </div>
    </div>
  </div>
</div>
