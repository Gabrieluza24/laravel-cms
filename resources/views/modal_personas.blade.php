            <!-- modal add Auto -->
            <div class="modal" id="crearAuto" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header card-header">
                            <h5 class="modal-title" id="mediumModalLabel">Agregar Nuevo Automovil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                            <form action="{{ route('cars.store') }}" method="POST" role="form" >
                        
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
                                                    <select id="anno" name="anno" class="form-control">
                                                    @for ($i=2020; $i>1886; $i--);
                                                    <option>{{$i}}</option>
                                                    @endfor
                                                    </select>
                                            </div>
                                            <div class="form-group">
                                                <select id="capacidad" name="capacidad" class="form-control">
                                                    @for ($i=1; $i<400; $i++);
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
            <div class="modal" id="editarAuto" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header card-header">
                            <h5 class="modal-title" id="mediumModalLabel">Editar Automovil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <form action="{{route('cars.update','cars')}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="modal-body">
                                <input type="hidden" name="key" id="key">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="placa" id="placa">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="marca" placeholder="Introduzca la Marca del Automovil" class="form-control" id="marca">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="modelo" placeholder="Introduzca el Modelo del Automovil" class="form-control" id="modelo">
                                        </div>
                                        <div class="form-group">
                                                    <select id="anno" name="anno" class="form-control">
                                                    @for ($i=2020; $i>1886; $i--);
                                                    <option>{{$i}}</option>
                                                    @endfor
                                                    </select>
                                        </div>
                                        <div class="form-group">
                                            <select id="capacidad" name="capacidad" class="form-control">
                                                @for ($i=1; $i<400; $i++);
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