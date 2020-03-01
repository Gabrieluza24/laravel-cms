            <!-- modal edit User -->
            <div class="modal" id="editarUsuario" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header card-header">
                            <h5 class="modal-title" id="mediumModalLabel">Editar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <form action="{{route('user.edit','user')}}" method="GET">
                            @csrf

                            <div class="modal-body">
                                <input type="hidden" name="key" id="key">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputname">Nombre</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="inputlastname">Apellido</label>
                                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" id="lastname">
                                    </div>
                                </div>
                                <div class="form-row">
                                        <label for="inputcedula" class="col-md-6">Cedula</label>
                                        <label for="inputtelefono" class="col-md-6">Telefono</label>
                                    <div class="form-group col-md-2">
                                        <select id="tipocedula" name="tipocedula" class="form-control">
                                            <option value="">--</option>
                                            <option value="V">V</option>
                                            <option value="E">E</option> 
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" name="cedula" id="cedula">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" id="telefono">
                                    </div>
                                </div>
                                <div class="form-row">
                                    
                                    <div class="form-group col-md-6">
                                       <label for="inputemail">Email</label>
                                       <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="inputpassword">Rol</label>
                                       <select id="role" name="role" class="form-control">
                                            <option value="">--</option>
                                            @foreach ($roles as $role)
                                                <option value="{{$role->slug}}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
            <!-- end modal edit User -->