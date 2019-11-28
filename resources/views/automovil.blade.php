@include('layouts.mainheader')

            <!-- modal medium -->
            <div class="modal" id="crearAuto" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header card-header">
                            <h5 class="modal-title" id="mediumModalLabel">Agregar Nuevo Automovil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                            <form action="/automovil" method="POST" role="form" >
                        
                            {{ csrf_field() }}

                            <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="placa" placeholder="Introduzca el Numero de Placa">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="marca" placeholder="Introduzca la Marca del Automovil" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="modelo" placeholder="Introduzca el Modelo del Automovil" class="form-control">
                                        </div>
                                            <div class="form-group">
                                                    <input type="text" name="anno" placeholder="Seleccione el ano del Automovil" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                    <input type="text" name="capacidad" placeholder="Cuantos litos de Gasolina permite" class="form-control">
                                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                        </form>   
                    </div>
                </div>
            </div>
            <!-- end modal medium -->



@include('layouts.main-layout')
@include('layouts.mainfooter')


 <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Placa</th>
                                                <th>Marca</th>
                                                <th>Modelo</th>
                                                <th>anno</th>
                                                <th>Capacidad</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($automoviles as $automovil)
                                            <tr>
                                                <td>{{ $automovil->placa }}</td>
                                                <td>{{ $automovil->marca }}</td>
                                                <td>{{ $automovil->modelo }}</td>
                                                <td>{{ $automovil->anno }}</td>
                                                <td>{{ $automovil->capacidad }} litros</td>
                                                <td>
                                                    <div class="table-data-feature">                   
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-data__tool-right" style="float:right">
                                        <button type="button" class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#crearAuto">
                                            <i class="zmdi zmdi-plus"></i>Nuevo
                                        </button>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

