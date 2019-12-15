@include('layouts.mainheader')
@include('layouts.main-layout')
@include('layouts.mainfooter')

      <div class="row m-t-30">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <strong class="card-title mb-3">Perfil Actual</strong>
            </div>
            <div class="card-body">
              <div class="mx-auto d-block">
                <h5 class="text-sm-center mt-2 mb-1">{{ Auth::user()->name }}</h5>
                <div class="text-sm-center">
                  <i class=""></i> Administrador</div>
                <div class="text-sm-center">
                  <i class="fa fa-map-marker"></i> Merida, Venezuela</div>
                <div class="text-sm-center">
                  <i class=""></i> V-23716595</div>  
                <div class="location text-sm-center">
                  <i class=""></i> 0424-7527343</div>  
                <div class="text-sm-center">
                    <i class=""></i> {{ Auth::user()->email }}</div>  
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
                <div class="card">
                  <div class="card-header">
                    <h4>Modificar Perfil</h4>
                  </div>
                  <div class="card-body">
                    <div class="custom-tab">
                      <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <a class="nav-item nav-link active" id="custom-nav-datos-tab" data-toggle="tab" href="#custom-nav-datos" role="tab" aria-controls="custom-nav-datos"
                           aria-selected="true">Datos Personales</a>
                          <a class="nav-item nav-link" id="custom-nav-password-tab" data-toggle="tab" href="#custom-nav-password" role="tab" aria-controls="custom-nav-password"
                           aria-selected="false">Contraseña</a>
                        </div>
                      </nav>
                      <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="custom-nav-datos" role="tabpanel" aria-labelledby="custom-nav-datos-tab">
                        <form>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputname">Nombre</label>
                          <input type="text" class="form-control" id="inputname" placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputlastname">Apellido</label>
                          <input type="text" class="form-control" id="inputlastname" placeholder="Apellido">
                        </div>
                      </div>
                      <div class="form-row">
                        <label class="col-md-12" for="inputtelefono">Cedula</label> 
                        <div class="form-group col-md-2">
                          <select id="tipocedula" name="tipocedula" class="form-control">
                                <option value=""> </option>
                                <option value="1">V-</option>
                                <option value="2">E-</option> 
                                <option value="3">P-</option> 
                                <option value="4">J-</option> 
                                <option value="5">G-</option> 
                          </select>
                        </div>
                        <div class="form-group col-md-10">
                          <input type="text" class="form-control" id="inputCedula" placeholder="Cedula de Identidad">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputtelefono">Telefono</label>
                          <input type="text" class="form-control" id="inputtelefono" placeholder="Telefono">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputState">Estado</label>
                          <select id="inputState" class="form-control">
                            <option selected>Seleccione</option>
                            <option>Merida</option>
                          </select>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                    </form>
                        </div>
                        <div class="tab-pane fade" id="custom-nav-password" role="tabpanel" aria-labelledby="custom-nav-password-tab">
                          <form>
                            <div class="form-group">
                              <label for="Password1">Contrasena Actual</label>
                              <input type="password" class="form-control" id="Password1">
                            </div>
                            <div class="form-group">
                              <label for="Password2">Nueva Contrasena</label>
                              <input type="password" class="form-control" id="Password2">
                            </div>
                            <div class="form-group">
                              <label for="Password3">Repita la Contrasena</label>
                              <input type="password" class="form-control" id="Password3">
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
</div>
