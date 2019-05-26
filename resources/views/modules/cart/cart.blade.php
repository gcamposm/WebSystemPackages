@extends('layouts.app')


@section('content')
    <div class="cart-section container">
        <div>
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Cart::count() > 0)

            <h2>{{ Cart::count() }} item(s) en el carrito de compra</h2>

            <div class="cart-table">
                @foreach (Cart::content() as $item)
                    @if(get_class($item->model) == "App\Modules\FlightReservation\Flight")
                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="#"><img src="https://picsum.photos/180/120?image={{ mt_rand(1043, 1052) }}" alt="item" class="cart-table-img"></a>
                                <div class="cart-item-details">
                                    @if($item->model->escalas == 1)
                                        <div class="cart-table-item"><a href="#">Destino: {{ $item->model->getTramo1->destiny->ciudad }}</a></div>
                                        <div>Fecha salida: {{ $item->model->fecha_despegue }}</div>
                                        <div>Cabina: {{ $item->model->tipoCabina($item->subtotal/$item->qty) }}</div>
                                    @endif
                                    @if($item->model->escalas == 2)
                                        <div class="cart-table-item"><a href="#">Destino: {{ $item->model->getTramo2->destiny->ciudad }}</a></div>
                                        <div>Fecha salida: {{ $item->model->fecha_despegue }}</div>
                                        <div>Cabina: {{ $item->model->tipoCabina($item->subtotal/$item->qty)}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="cart-table-row-right">
                                <div style="margin: 4%;">{{ $item->subtotal}}</div>
                                <div>
                                    <select class="quantity" style="margin:  9px !important;" data-id="{{ $item->rowId }}">
                                        @for ($i = 1; $i < $item->qty + 1 ; $i++)
                                            <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="cart-table-actions">
                                    {{--<a href="#">Remove</a> <br>--}}
                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button id="butonRemove" type="submit" class="btn btn-danger btn-galaxy" style="font-size: 14px !important; margin: 0% !important">Eliminar</button>
                                    </form>
                                    {{-- <a href="#">Guardar para luego</a> --}}
                                </div>
                            </div>
                        </div> <!-- end cart-table-row -->
                    @endif
                    @if(get_class($item->model) == "App\Modules\FlightReservation\RoundtripFlight")
                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="#"><img src="https://picsum.photos/180/120?image={{ mt_rand(1043, 1052) }}" alt="item" class="cart-table-img"></a>
                                <div class="cart-item-details">
                                    @if($item->model->vueloIda->escalas == 1)
                                        <div class="cart-table-item"><a href="#">Destino: {{ $item->model->vueloIda->getTramo1->destiny->ciudad }}</a></div>
                                        <div>Fecha salida: {{ $item->model->vueloIda->fecha_despegue }}</div>
                                        <div>Cabina: {{ $item->model->tipoCabina($item->subtotal/$item->qty) }}</div>
                                    @endif
                                    @if($item->model->vueloIda->escalas == 2)
                                        <div class="cart-table-item"><a href="#">Destino: {{ $item->model->vueloIda->getTramo2->destiny->ciudad }}</a></div>
                                        <div>Fecha salida: {{ $item->model->vueloIda->fecha_despegue }}</div>
                                        <div>Cabina: {{ $item->model->tipoCabina($item->subtotal/$item->qty)}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="cart-table-row-right">
                                <div style="margin: 4%;">{{ $item->subtotal}}</div>
                                <div>
                                    <select class="quantity" style="margin:  9px !important;" data-id="{{ $item->rowId }}">
                                        @for ($i = 1; $i < $item->qty + 1 ; $i++)
                                            <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="cart-table-actions">
                                    {{--<a href="#">Remove</a> <br>--}}
                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button id="butonRemove" type="submit" class="btn btn-danger btn-galaxy" style="font-size: 14px !important; margin: 0% !important">Eliminar</button>
                                    </form>
                                    {{-- <a href="#">Guardar para luego</a> --}}
                                </div>
                            </div>
                        </div> <!-- end cart-table-row -->
                    @endif
                    @if(get_class($item->model) == "App\Modules\HousingReservation\HotelRoom")
                    <div class="cart-table-row">
                        <div class="cart-table-row-left">
                            <a href="#"><img src="https://picsum.photos/180/120?image={{ mt_rand(1, 50) }}" alt="item" class="cart-table-img"></a>
                            <div class="cart-item-details">
                                <div class="cart-table-item"><a href="#">Capacidad: {{ $item->model->capacidad }}</a></div>
                                <div>Camas: {{ $item->model->camas}}</div>
                                <div>ID: {{ $item->model->id}}</div>
                            </div>
                        </div>
                        <div class="cart-table-row-right">
                            <div style="margin: 4%;">{{ $item->subtotal}}</div>
                            <div>
                                <select class="quantity" style="margin:  9px !important;" data-id="{{ $item->rowId }}">
                                    @for ($i = 1; $i < $item->qty + 1 ; $i++)
                                        <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="cart-table-actions">
                                {{--<a href="#">Remove</a> <br>--}}
                                <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button id="butonRemove" type="submit" class="btn btn-danger btn-galaxy" style="font-size: 14px !important; margin: 0% !important">Eliminar</button>
                                </form>
                                {{-- <a href="#">Guardar para luego</a> --}}
                            </div>
                        </div>
                    </div> <!-- end cart-table-row -->
                    @endif
                    @if(get_class($item->model) == "App\Modules\VehicleReservation\Vehicle")
                    <div class="cart-table-row">
                        <div class="cart-table-row-left">
                            <a href="#"><img src="https://picsum.photos/180/120?image={{ mt_rand(1, 50) }}" alt="item" class="cart-table-img"></a>
                            <div class="cart-item-details">
                                <div class="cart-table-item"><a href="#">Marca: {{ $item->model->marca }}</a></div>
                                <div>Tipo: {{ $item->model->tipo}}</div>
                            </div>
                        </div>
                        <div class="cart-table-row-right">
                            <div style="margin: 4%;">{{ $item->subtotal}}</div>
                            <div>
                                <select class="quantity" style="margin:  9px !important;" data-id="{{ $item->rowId }}">
                                    @for ($i = 1; $i < $item->qty + 1 ; $i++)
                                        <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="cart-table-actions">
                                {{--<a href="#">Remove</a> <br>--}}
                                <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button id="butonRemove" type="submit" class="btn btn-danger btn-galaxy" style="font-size: 14px !important; margin: 0% !important">Eliminar</button>
                                </form>
                                {{-- <a href="#">Guardar para luego</a> --}}
                            </div>
                        </div>
                    </div> <!-- end cart-table-row -->
                    @endif
                    @if(get_class($item->model) == "App\Modules\Others\Insurance")
                    <div class="cart-table-row">
                        <div class="cart-table-row-left">
                            <a href="#"><img src="https://picsum.photos/180/120?image={{ mt_rand(1, 50) }}" alt="item" class="cart-table-img"></a>
                            <div class="cart-item-details">
                                <div class="cart-table-item"><a href="#">Seguro {{ $item->model->medicalService }}</a></div>
                                <div>{{ $item->model->service2}}</div>
                                </br>
                                <div>{{ $item->model->service3}}</div>
                            </div>
                        </div>
                        <div class="cart-table-row-right">
                            <div style="margin: 4%;">{{ $item->subtotal}}</div>
                            <div>
                                <select class="quantity" style="margin:  9px !important;" data-id="{{ $item->rowId }}">
                                    @for ($i = 1; $i < $item->qty + 1 ; $i++)
                                        <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="cart-table-actions">
                                {{--<a href="#">Remove</a> <br>--}}
                                <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button id="butonRemove" type="submit" class="btn btn-danger btn-galaxy" style="font-size: 14px !important; margin: 0% !important">Eliminar</button>
                                </form>
                                {{-- <a href="#">Guardar para luego</a> --}}
                            </div>
                        </div>
                    </div> <!-- end cart-table-row -->
                    @endif
                    @if(get_class($item->model) == "App\Modules\Others\Package")
                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="#"><img src="https://picsum.photos/180/120?image={{ mt_rand(1, 50) }}" alt="item" class="cart-table-img"></a>
                                <div class="cart-item-details">
                                    <div class="cart-table-item"><a href="#">Dias:{{ $item->model->getDias() }}</a></div>
                                    @if($item->model->type == 2)
                                        <div class="cart-table-item"><a href="#">Marca vehículo:{{ $item->model->vehicle->marca }}</a></div>
                                    @endif
                                </div>
                            </div>
                            <div class="cart-table-row-right">
                                <div style="margin: 4%;">{{ $item->subtotal}}</div>
                                <div>
                                    <select class="quantity" style="margin:  9px !important;" data-id="{{ $item->rowId }}">
                                        @for ($i = 1; $i < $item->qty + 1 ; $i++)
                                            <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="cart-table-actions">
                                    {{--<a href="#">Remove</a> <br>--}}
                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button id="butonRemove" type="submit" class="btn btn-danger btn-galaxy" style="font-size: 14px !important; margin: 0% !important">Eliminar</button>
                                    </form>
                                    {{-- <a href="#">Guardar para luego</a> --}}
                                </div>
                            </div>
                        </div> <!-- end cart-table-row -->
                    @endif
                @endforeach

            </div> <!-- end cart-table -->

            <div class="cart-totals" style="background: transparent !important;">
                <div class="cart-totals-left">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium nemo deserunt explicabo aut dolores praesentium rem repellendus! Sint corporis aperiam molestias.
                </div>

                <div class="cart-totals-right">
                    <div>
                        Subtotal <br>
                        Impuesto <br>
                        <span class="cart-totals-total">Total</span>
                    </div>
                    <div class="cart-totals-subtotal">
                        {{ Cart::subtotal() }}<br>
                        {{ Cart::tax() }} <br>
                    <span class="cart-totals-total">{{ Cart::total() }}</span>
                    </div> 
                </div>
            </div> <!-- end cart-totals -->

            <div class="cart-buttons">
                <a href="/" class="button">Continuar Comprando</a>
                <a href="{{ route('checkout.index')}}" class="btn btn-success btn-galaxy">Proceder a la Revisión</a>
            </div>
            @else

                <h3>¡No hay items en el carrito!</h3>
            @endif

        </div>

    </div> <!-- end cart-section -->

    <div class="might-like-section" style="background: transparent !important;">
        <div class="container">
            <h2>También te podría interezar...</h2>
            <div class="might-like-grid">
                @foreach ($mightAlsoLike as $product)
                    <a href=# class="might-like-product" style="background: transparent !important; color:white !important; border-color:white !important;">
                        <img src="https://picsum.photos/200/150?image={{ mt_rand(1, 50) }}" alt="product">
                        <div class="might-like-product-name">Viaje a: {{ $product->destiny->ciudad }}</div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>

    <script>
        (function(){
            //clase que contiene el contador
            const classname = document.querySelectorAll('.quantity')
            //convert array
            Array.from(classname).forEach(function(element){
                element.addEventListener('change', function(){
                    const id = element.getAttribute('data-id')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value
                    })
                    .then(function (response) {
                        console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
            // Array.from(classname).forEach(function(element) {
            //     element.addEventListener('change', function() {
            //         const id = element.getAttribute('data-id')
            //         axios.patch(`/cart/${id}`, {
            //             quantity: this.value
            //         })
            //         .then(function (response) {
            //             console.log(response);
            //             window.location.href = '{{ route('cart.index') }}'
            //         })
            //         .catch(function (error) {
            //             console.log(error);
            //             window.location.href = '{{ route('cart.index') }}'
            //         });
            //     })
            // })
        })();
    </script>
@endsection

