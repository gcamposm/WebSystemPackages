<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">
        .invoice-card {
            background: white !important;
            color: black !important;
        }
        .information {
            background: linear-gradient(45deg, #1de099, #1dc8cd) !important;
            color: #FFF;
        }
    </style>

</head>
<body>
    <main>
            <div class="card invoice-card">
                <div class="card-header invoice-card">
            </div>
            <div class="card-body invoice-card">
            <span class="float-right" style="color:black;"> <strong>Factura:</strong> {{ $venta->source }} </span>
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <div>
                            <strong>GP14Airland</strong>
                        </div>
                        <div>Alguna Calle</div>
                        <div>En algún lado, En algún país</div>
                        <div>Email: contacto@rollers.cl</div>
                        <div>Teléfono: +56 944 666 3333</div>
                    </div>
                </div>
            @if (count($venta->flightSellDetail) != 0)
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Vuelos</th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="align-middle">Tipo de Vuelo</th>
                                <th class="align-middle">Pasajeros</th>
                                <th class="align-middle">Origen</th>
                                <th class="align-middle">Destino</th>
                                <th class="align-middle">Número de Escalas</th>
                                <th class="align-middle">Cabina</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($venta->flightSellDetail as $flightSellDetail)
                            <tr>
                                @if ($flightSellDetail->flight_id == null)
                                    <td class="align-middle">Ida y Vuelta</td> 
                                    <td class="align-middle">{{ $flightSellDetail->cantidad}}</td>
                                    <td class="align-middle">{{ $flightSellDetail->roundtrip->vueloIda->origin->nombre }}</td>
                                    <td class="align-middle">{{ $flightSellDetail->roundtrip->vueloIda->destiny->nombre  }}</td>
                                    <td class="align-middle">Ida:{{ $flightSellDetail->roundtrip->vueloIda->escalas }} Vuelta:{{ $flightSellDetail->roundtrip->vueloVuelta->escalas }}</td>
                                    <td class="align-middle">{{ $flightSellDetail->tipo }}</td>
                                @else
                                    <td class="align-middle">Sólo ida</td>
                                    <td class="align-middle">{{ $flightSellDetail->cantidad }}</td>
                                    <td class="align-middle">{{ $flightSellDetail->flight->origin->nombre }}</td>
                                    <td class="align-middle">{{ $flightSellDetail->flight->destiny->nombre }}</td>
                                    <td class="align-middle">{{ $flightSellDetail->flight->escalas }}</td>
                                    <td class="align-middle">{{ $flightSellDetail->tipo }}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            @if (count($venta->hotelReservation) != 0)
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Hoteles</th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="align-middle">Fecha de ingreso</th>
                                <th class="align-middle">Fecha de salida</th>
                                <th class="align-middle">Cantidad</th>
                                <th class="align-middle">Descuento</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($venta->hotelReservation as $hotelReservation)
                            <tr>
                                <td class="align-middle">{{ $hotelReservation->fecha_ingreso }}</td>
                                <td class="align-middle">{{ $hotelReservation->fecha_egreso }}</td>
                                <td class="align-middle">{{ $hotelReservation->cantidad }}</td>
                                <td class="align-middle">{{ $hotelReservation->descuento }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            @if (count($venta->vehicleReservation) != 0)
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Vehículos</th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="align-middle">Zona</th>
                                <th class="align-middle">Patente</th>
                                <th class="align-middle">Marca</th>
                                <th class="align-middle">Tipo</th>
                                <th class="align-middle">Transmisión</th>
                                <th class="align-middle">Combustible</th>
                                <th class="align-middle">A/Acondicionado</th>
                                <th class="align-middle">Precio/día</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($venta->vehicleReservation as $vehicleReservation)
                            <tr>
                                <td class="align-middle">{{ $vehicleReservation->vehicle->zone->nombre }}</td>
                                <td class="align-middle">{{ $vehicleReservation->vehicle->patente }}</td>
                                <td class="align-middle">{{ $vehicleReservation->vehicle->marca }}</td>
                                <td class="align-middle">{{ $vehicleReservation->vehicle->tipo }}</td>
                                <td class="align-middle">{{ $vehicleReservation->vehicle->transmision }}</td>
                                <td class="align-middle">{{ $vehicleReservation->vehicle->combustible }}</td>
                                <td class="align-middle">{{ $vehicleReservation->vehicle->aire_acondicionado }}</td>
                                <td class="align-middle">{{ $vehicleReservation->vehicle->precio }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            @if (count($venta->insuranceReservation) != 0)
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Seguros</th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="align-middle">Zona</th>
                                <th class="align-middle">Tipo</th>
                                <th class="align-middle">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($venta->insuranceReservation as $insuranceReservation)
                            <tr>
                                <td class="align-middle">{{ $insuranceReservation->insurance->zone->nombre }}</td>
                                <td class="align-middle">{{ $insuranceReservation->insurance->groupsize }}</td>
                                <td class="align-middle">{{ $insuranceReservation->insurance->price }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            @if (count($venta->insuranceReservation) != 0)
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Paquetes</th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="align-middle">Hotel</th>
                                <th class="align-middle">Destino</th>
                                <th class="align-middle">Duración</th>
                                <th class="align-middle">Patente</th>
                                <th class="align-middle">Marca</th>
                                <th class="align-middle">Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($venta->packageReservation as $packageReservation)
                        <tr>
                            <td class="align-middle">{{ $packageReservation->package->hotelroom->hotel->nombre }}</td>
                            <td class="align-middle">{{ $packageReservation->package->hotelroom->hotel->ciudad }}</td>
                            <td class="align-middle">{{ $packageReservation->package->getDias() }}</td>
                            <td class="align-middle">{{ $packageReservation->package->vehicle->patente }}</td>
                            <td class="align-middle">{{ $packageReservation->package->vehicle->marca }}</td>
                            <td class="align-middle">{{ $packageReservation->package->vehicle->tipo }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-4 col-sm-5">

                </div>

            <div class="col-lg-4 col-sm-5 ml-auto">
            <table class="table table-clear">
            <tbody>
            <tr>
            <td class="left">
            <strong>Impuesto</strong>
            </td>
        <td class="right">${{ $venta->impuesto }}</td>
            </tr>
            <tr>
            <td class="left">
            <strong>Total</strong>
            </td>
            <td class="right">
            <strong>${{ $venta->monto_total }}</strong>
            </td>
            </tr>
            </tbody>
            </table>

            </div>

            </div>

            </div>
            </div>
    </main>

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-lg-left text-center">
                        <div class="copyright ">
                            &copy; Copyright <strong>GP14LATAM</strong>. Todos los derechos reservados
                        </div>
                    </div>
                </div>
            </div>
        </footer><!-- #footer -->
</body>
</html>