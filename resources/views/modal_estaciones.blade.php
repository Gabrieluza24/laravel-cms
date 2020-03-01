            <!-- modal add Auto -->
            <div class="modal" id="crearEstacion" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header card-header">
                            <h5 class="modal-title" id="mediumModalLabel">Agregar Nueva Estacion de Servicio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                            <form action="{{ route('estaciones.store') }}" method="POST" role="form" >
                        
                            {{ csrf_field() }}

                            <div class="modal-body">
                                <div class="form-group">
                                    <label> Introduzca el RIF de la estacion de Servicio </label>
                                    <input type="text" class="form-control" name="rif" placeholder="J-00000000-0">
                                </div>
                                <div class="form-group">
                                    <label> Introduzca el Nombre de la estacion de Servicio </label>
                                    <input type="text" name="nombre" placeholder="Nombre de la Estacion de Servicio" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Introduzca la Direccion de la estacion de Servicio </label>
                                    <input type="text" name="direccion" placeholder="Direccion" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Indique el Numero de Surtidores que posee </label>
                                    <select id="surtidores" name="surtidores" class="form-control">
                                        @for ($i=1; $i<10; $i++);
                                            <option>{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> Indique la capacidad maxima de la Estacion de Servicio </label>
                                    <select id="capacidad" name="capacidad" class="form-control">
                                        @for ($i=36000; $i<=300000; $i=$i+2000);
                                            <option>{{$i}}</option>
                                        @endfor
                                    </select>
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
            <!-- end modal Add Auto -->

            <!-- modal edit Auto -->
            <div class="modal" id="editarEstacion" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header card-header">
                            <h5 class="modal-title" id="mediumModalLabel">Editar Estacion de Servicio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <form action="{{route('estaciones.update','estaciones')}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="modal-body">
                                <input type="hidden" name="key" id="key">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="rif" id="rif">
                                        </div>
                                        <div class="form-group">
                                            <label> Introduzca el Nombre de la estacion de Servicio </label>
                                            <input type="text" name="nombre" placeholder="Nombre de la Estacion de Servicio" class="form-control" id="nombre">
                                        </div>
                                        <div class="form-group">
                                            <label> Introduzca la direccion de la estacion de Servicio </label>
                                            <input type="text" name="direccion" placeholder="Direccion" class="form-control" id="direccion">
                                        </div>
                                        <div class="form-group">
                                            <label> Indique el Numero de Surtidores que posee </label>
                                            <select id="surtidores" name="surtidores" class="form-control">
                                                    @for ($i=1; $i<10; $i++);
                                                    <option>{{$i}}</option>
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label> Indique la capacidad maxima de la Estacion de Servicio </label>
                                            <select id="capacidad" name="capacidad" class="form-control">
                                                @for ($i=36000; $i<=300000; $i=$i+2000);
                                                    <option>{{$i}}</option>
                                                @endfor
                                            </select>
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
            <!-- end modal edit Auto -->
