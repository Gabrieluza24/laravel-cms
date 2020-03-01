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
                                                <th>Vehiculo</th>
                                                <th>Placa</th>
                                                <th>Estacion de Servicio</th>
                                                <th>Estatus</th>
                                                <th>Aprobacion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($solicitudes as $solicitud)
                                            <tr>
                                                <td>{{ $solicitud->codigo }}</td>
                                                <td>{{ $solicitud->car()->pluck('marca')->first() }}  {{ $solicitud->car()->pluck('modelo')->first() }}</td>
                                                <td>{{ $solicitud->placa_car }}</td>
                                                <td>{{ $solicitud->estacion()->pluck('nombre')->first()  }}</td>
                                                    @if ($solicitud->id_status == '1' )
                                                        <td>En Espera</td>
                                                    @can('solicitudes.destroy')
                                                        <td>
                                                            <div class="table-data-feature">  

                                                               <form action="{{ route('solicitudes.destroy',$solicitud->codigo)}}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="item" type="submit" data-placement="top" title="Delete">
                                                                        <i class="zmdi zmdi-delete"> </i>
                                                                    </button>
                                                                </form>
                                                            @endcan
                                                            </div>
                                                        </td>
                                                    @endif
                                                    @if ($solicitud->id_status == '2' )
                                                        <td> Aprobada </td>
                                                        <td>{{ $solicitud->aprobacion }} </td>
                                                    @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                        </div>
</div>