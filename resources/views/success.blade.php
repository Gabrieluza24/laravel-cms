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
                                                <th>Estacion de Servicio</th>
                                                <th>Placa</th>
                                                <th>Capacidad</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($success as $s)
                                            <tr>
                                                <td>{{ $s->estacion()->pluck('nombre')->first() }}</td>
                                                <td>{{ $s->placa_car }}</td>
                                                <td>{{ $s->capacidad_car }} Litros</td>
                                                <td>{{ $s->fecha_gestion }}</td>
                                                        
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                        </div>
</div>