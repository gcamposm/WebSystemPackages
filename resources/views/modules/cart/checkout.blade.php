@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">

        @if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="checkout-heading stylish-heading">Revisión</h1>
        <div class="checkout-section">
            <div>
                <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                    {{ csrf_field() }}
                    <h2>Detalles de Facturación</h2>

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ auth()->user()->address }}">
                    </div>

                    <div class="half-form">
                        <div class="form-group">
                            <label for="city">Ciudad</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ auth()->user()->city }}">
                        </div>
                        <div class="form-group">
                            <label for="province">Comuna</label>
                            <input type="text" class="form-control" id="province" name="province" value="{{ auth()->user()->province }}">
                        </div>
                    </div> <!-- end half-form -->

                    <div class="half-form">
                        <div class="form-group">
                            <label for="postalcode">Código Postal</label>
                            <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ auth()->user()->postalcode }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ auth()->user()->phone }}">
                        </div>
                    </div> <!-- end half-form -->

                    <div class="form-group">
                        <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                    </div>

                    <div class="spacer"></div>

                    <h2>Detalles de Pago</h2>

                    <div class="form-group">
                        <label for="name_on_card">Nombre en la Tarjeta</label>
                        <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="{{ auth()->user()->name_on_card }}">
                    </div>

                    <div class="form-group">
                        <label for="card-element">
                          Tarjeta de crédito o débito
                        </label>
                        <div id="card-element">
                          <!-- a Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <div class="spacer"></div>
                    <center>
                        <button type="submit" id="complete-order" class="btn btn-success btn-galaxy">Completar Orden</button>
                    </center>

                </form>
            </div>



            <div class="checkout-table-container">
                <h2>Su Orden</h2>

                <div class="checkout-table">
                    @foreach (Cart::content() as $item)
                        @if(get_class($item->model) == "App\Modules\FlightReservation\FlightDetail")
                            <div class="checkout-table-row">
                                <div class="checkout-table-row-left">
                                    <img src="https://picsum.photos/120/180?image={{ mt_rand(1, 50) }}" alt="" class="checkout-table-img">
                                    <div class="checkout-item-details">
                                        @if($item->model->escalas == 1)
                                            <div class="cart-table-item"><a href="#">Destino: {{ $item->model->getTramo1->destiny->ciudad }}</a></div>
                                            <div>Fecha salida: {{ $item->model->fecha_despegue }}</div>
                                        @endif
                                        @if($item->model->escalas == 2)
                                            <div class="cart-table-item"><a href="#">Destino: {{ $item->model->getTramo2->destiny->ciudad }}</a></div>
                                            <div>Fecha salida: {{ $item->model->fecha_despegue }}</div>
                                        @endif
                                        <div class="checkout-table-price">Subtotal: {{ $item->subtotal }}</div>
                                    </div>
                                </div> <!-- end checkout-table -->
                            
                                <div class="checkout-table-row-right">
                                    <div class="checkout-table-quantity">{{ $item->qty }}</div>
                                </div>
                            </div> <!-- end checkout-table-row -->
                        @endif
                        @if(get_class($item->model) == "App\Modules\VehicleReservation\Vehicle")
                            <div class="checkout-table-row">
                                <div class="checkout-table-row-left">
                                    <img src="https://picsum.photos/120/180?image={{ mt_rand(1, 50) }}" alt="" class="checkout-table-img">
                                    <div class="checkout-item-details">
                                            <div class="cart-table-item"><a href="#">Marca: {{ $item->model->marca}}</a></div>
                                            <div class="cart-table-description">Tipo: {{ $item->model->tipo }}</div>
                                        <div class="checkout-table-price">Subtotal: {{ $item->subtotal}}</div>
                                    </div>
                                </div> <!-- end checkout-table -->
                            
                                <div class="checkout-table-row-right">
                                    <div class="checkout-table-quantity">{{ $item->qty }}</div>
                                </div>
                            </div> <!-- end checkout-table-row -->
                        @endif
                    @endforeach



                </div> <!-- end checkout-table -->

                <div class="checkout-totals">
                    <div class="checkout-totals-left">
                        Subtotal <br>
                        {{-- Discount (10OFF - 10%) <br> --}}
                        Tax <br>
                        <span class="checkout-totals-total">Total</span>

                    </div>

                    <div class="checkout-totals-right">
                        {{ Cart::subtotal() }} <br>
                        {{-- -$750.00 <br> --}}
                        {{ Cart::tax() }} <br>
                        <span class="checkout-totals-total">{{ Cart::total() }}</span>

                    </div>
                </div> <!-- end checkout-totals -->

            </div>

        </div> <!-- end checkout-section -->
    </div>


<script src="https://js.stripe.com/v3/"></script>
<script>
    (function(){
        // Create a Stripe client
        var stripe = Stripe('pk_test_ncvmzwDJL7zhmSBts4gZbWLl');

        // Create an instance of Elements
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
            },
            invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element
        var card = elements.create('card', {
            style: style,
            hidePostalCode: true
        });

        // Add an instance of the card Element into the `card-element` <div>
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
            displayError.textContent = event.error.message;
            } else {
            displayError.textContent = '';
            }
        });

        // Handle form submission
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            // Disable the submit button to prevent repeated clicks
            document.getElementById('complete-order').disabled = true;

            var options = {
            name: document.getElementById('name_on_card').value,
            address_line1: document.getElementById('address').value,
            address_city: document.getElementById('city').value,
            address_state: document.getElementById('province').value,
            address_zip: document.getElementById('postalcode').value
            }

            stripe.createToken(card, options).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;

                // Enable the submit button
                document.getElementById('complete-order').disabled = false;
            } else {
                // Send the token to your server
                stripeTokenHandler(result.token);
            }
            });
        });

        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
        form.submit();
        }
    })();
</script>

@endsection

