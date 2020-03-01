           <!-- modal add Auto -->
            <div class="modal" id="crearTransporte" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header card-header">
                            <h5 class="modal-title" id="mediumModalLabel">Agregar Nuevo Cisterna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                            <form action="{{ route('transportes.store') }}" method="POST" role="form" >
                        
                            {{ csrf_field() }}

                            <div class="modal-body">
                                        <div class="form-group">
                                             <label>Introduzca el Numero de placa</label>
                                            <input type="text" class="form-control" name="placa">
                                        </div>
                                        <div class="form-group">
                                            <label>Introduzca la Marca del Camion</label>
                                            <input type="text" name="marca" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Introduzca el Modelo del Camion</label>
                                            <input type="text" name="modelo" class="form-control">
                                        </div>
                                            <div class="form-group">
                                                <label>Seleccione del Año del Camion</label>
                                                <select id="anno" name="anno" class="form-control">
                                                    @for ($i=2020; $i>1886; $i--);
                                                        <option>{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Introduzca el Nombre completo del Conductor</label>
                                                <input type="text" name="chofer" class="form-control">
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
            <div class="modal" id="editarTransporte" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header card-header">
                            <h5 class="modal-title" id="mediumModalLabel">Editar Transporte</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <form action="{{route('transportes.update','transportes')}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="modal-body">
                                <input type="hidden" name="key" id="key">
                                <label> Introduzca el Numero de placa</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="placa" id="placa">
                                </div>
                                <div class="form-group">
                                    <label> Introduzca la Marca del Transporte</label>
                                    <input type="text" name="marca" class="form-control" id="marca">
                                </div>
                                <div class="form-group">
                                    <label> Introduzca el Modelo del Transporte</label>
                                    <input type="text" name="modelo" class="form-control" id="modelo">
                                </div>
                                <div class="form-group">
                                    <label> Seleccione el año de Fabricacion</label>
                                    <select id="anno" name="anno" class="form-control">
                                        @for ($i=2020; $i>1886; $i--);
                                            <option>{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> Introduzca el nombre del Conductor</label>
                                    <input type="text" name="chofer" class="form-control" id="chofer">
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
