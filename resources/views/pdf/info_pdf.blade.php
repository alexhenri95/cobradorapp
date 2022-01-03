<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <style>
        .info-header{
            line-height: 1px;
            padding-top: 10px;
        }

        h1{
            font-size: 24px;
        }
        h2{
            font-size: 18x;
        }
        table{
            line-height: 4px;
        }
        td, th{
            font-size: 13px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row">        
            <div class="col-xs-12">
                <div class="text-center header">
                    <h1>CobradorApp</h1>
                    
                    <div class="info-header">
                        <p><small>{{$loan->user->name}}</small></p>
                        <p><small>{{$loan->user->email}}</small></p>
                    </div> 
                </div>
                
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-md-12">
                <h2>Información del cliente</h2>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td width="100px"><strong>Identificación</strong></td>
                            <td>{{$loan->customer->dni}}</td>
                        </tr>
                        <tr>
                            <td width="100px"><strong>Nombre</strong></td>
                            <td>{{$loan->customer->name}}</td>
                        </tr>
                        <tr>
                            <td width="100px"><strong>Dirección</strong></td>
                            <td>{{$loan->customer->address}}</td>
                        </tr>
                        <tr>
                            <td width="100px"><strong>Teléfono</strong></td>
                            <td>{{$loan->customer->phone}}</td>
                        </tr>
                        <tr>
                            <td width="100px"><strong>Email</strong></td>
                            <td>{{$loan->customer->email}}</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2>Detalle del préstamo</h2>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td width="100px"><strong>Código</strong></td>
                            <td>{{$loan->code}}</td>
                        </tr>
                        <tr>
                            <td width="100px"><strong>Fecha Inicio</strong></td>
                            <td>{{$loan->start_date}}</td>
                        </tr>
                        <tr>
                            <td width="100px"><strong>Fecha Fin</strong></td>
                            <td>{{$loan->end_date}}</td>
                        </tr>
                        <tr>
                            <td width="100px"><strong>Descripción</strong></td>
                            <td>{{$loan->description}}</td>
                        </tr>
                        <tr>
                            <td width="100px"><strong>Tipo De Pago</strong></td>
                            <td>
                                @switch($loan->payment_type)
                                    @case(1)
                                        CORRIENTE
                                        @break
                                    @case(2)
                                        DIFERIDO
                                        @break
                                    @default
                                @endswitch   
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>MONTO</th>
                            <th>CUOTAS</th>
                            <th>INT.</th>
                            <th>M. PAGAR</th>
                            <th>SALDO</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                ${{$loan->quantity}}
                            </td>
                            <td>
                                {{$loan->payments_number}} / ${{$loan->final_payment / $loan->payments_number}} 
                            </td>
                            <td>
                                {{$loan->interest}}
                            </td>
                            <td>
                                ${{$loan->final_payment}}        
                            </td>
                            <td>
                                ${{$loan->balance}}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2>Detalle de pagos</h2>
                @if($loan->payments->count())

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>FECHA</th>
                            <th>CANTIDAD</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($loan->payments as $payment)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                {{$payment->payment_date}}
                            </td>
                            <td>
                                ${{$payment->quantity}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p class="my-2 text-center">Aún no se ha realizado ningún pago a la deuda...</p>
                @endif
            </div>
        </div>
    </div>
    
</body>
</html>