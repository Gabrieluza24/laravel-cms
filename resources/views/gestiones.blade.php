@include('layouts.mainheader')
@include('layouts.main-layout')
@include('layouts.mainfooter')

    <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table id="datatable"class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tranporte</th>
                                                <th>Placa</th>
                                                <th>Estacion de Servicio</th>
                                                <th>Fecha de Recepcion</th>
                                                <th>Combustible</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($gestiones as $gestion)
                                            @if($gestion->litros > 20)
                                            <tr>
                                                <td>{{ $gestion->id }}</td>
                                                <td>{{ $gestion->transporte()->pluck('marca')->first() }}  {{ $gestion->transporte()->pluck('modelo')->first() }}</td>
                                                <td>{{ $gestion->placa_transporte }}</td>
                                                <td>{{ $gestion->estacion()->pluck('nombre')->first()  }}</td>
                                                 <td>{{ $gestion->fecha_despacho }}</td>
                                                 <td>{{ $gestion->litros }} litros</td>
                                                 <td>
                                                <div class="table-data-feature">
                                                @if($gestion->litros == $gestion->inicial)    
                                                    <form action="{{ route('gestiones.destroy', $gestion->id )}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="item" type="submit" data-placement="top" title="Eliminar">
                                                            <i class="zmdi zmdi-delete"> </i>
                                                        </button>
                                                    </form>
                                                @endif
                                                    <form action="{{ route('gestiones.notificar', $gestion->id )}}" method="post">
                                                        @csrf
                                                        <button class="item" type="submit" data-placement="top" title="Notificar">
                                                            <i class="zmdi zmdi-notifications"> </i>
                                                        </button>
                                                    </form>
                                                </div>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                                 
                        </div>
</div>