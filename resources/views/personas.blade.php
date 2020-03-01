@include('layouts.mainheader')
@include('layouts.main-layout')
@include('layouts.mainfooter')


      <div class="row m-t-30">
      @if(empty($personas->first()->cedula))
                <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Completar Registro</h4>
                  </div>
                  <div class="card-body">
                      <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="custom-nav-datos" role="tabpanel" aria-labelledby="custom-nav-datos-tab">
                        
                        <form action="{{ route('personas.store')}}" method="POST">
                          @csrf
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputname">Nombre</label>
                          <input type="text" class="form-control" id="inputname" name="name" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputlastname">Apellido</label>
                          <input type="text" class="form-control" id="inputlastname" name="lastname" value="{{ Auth::user()->lastname }}">
                        </div>
                      </div>
                      <div class="form-row">
                        <label class="col-md-12" for="inputtelefono">Cedula</label> 
                        <div class="form-group col-md-2">
                          <select id="tipocedula" name="tipocedula" class="form-control">
                                <option value="">--</option>
                                <option value="V">V</option>
                                <option value="E">E</option> 
                          </select>
                        </div>
                        <div class="form-group col-md-10">
                          <input type="text" class="form-control" id="inputCedula" name="cedula" placeholder="Cedula de Identidad">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputtelefono">Telefono</label>
                          <input type="text" class="form-control" id="inputtelefono" name="telefono" placeholder="Telefono">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputState">Estado</label>
                          <select id="inputState" name="estado" class="form-control">
                            <option selected>Seleccione</option>
                            <option>Merida</option>
                          </select>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Completar Registro</button>
                    </form>
                    @endif

      @if(!empty($personas->first()->cedula))
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <strong class="card-title mb-3">Perfil Actual</strong>
            </div>
            <div class="card-body">
              <div class="mx-auto d-block">
                <h5 class="text-sm-center mt-2 mb-1">{{ $personas->first()->name }} {{ $personas->first()->lastname }}</h5>
                <div class="text-sm-center">
                  <i class=""></i> {{auth()->user()->roles->pluck('name')->first()}}</div>
                <div class="text-sm-center">
                  <i class="fa fa-map-marker"></i> {{$personas->first()->estado}} , Venezuela</div>
                <div class="text-sm-center">
                  <i class=""></i> {{$personas->first()->tipocedula}}-{{$personas->first()->cedula}}</div> 
                <div class="location text-sm-center">
                  <i class=""></i>{{$personas->first()->telefono}}</div>  
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

                    <div class="custom-tab" id="nav-tabs">
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
                        
                        <form action="{{ route('personas.update' , 'personas')}}" method="POST">
                          @csrf
                          @method('PUT')                      
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputname">Nombre</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror"  id="inputname" name="name" value="{{$personas->first()->name}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputlastname">Apellido</label>
                          <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="inputlastname" name="lastname" value="{{$personas->first()->lastname}}">
                        </div>
                      </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputtelefono">Telefono</label>
                          <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="inputtelefono" name="telefono" value="{{$personas->first()->telefono}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputState">Estado</label>
                          <select id="inputState" name="estado" class="form-control">
                            <option selected>{{$personas->first()->estado}}</option>
                            <option >Merida</option>
                          </select>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                    </form>

                        </div>
                        <div class="tab-pane fade" id="custom-nav-password" role="tabpanel" aria-labelledby="custom-nav-password-tab">
                          <form action="{{ route('user.update', Auth::user() )}}" method="POST">
                          @csrf
                          @method('PUT')
                          <div class="form-group">
                              <label for="current_password">Contraseña Actual</label>
                              <input type="password" class="form-control " id="current_password" name="current_password">
                           </div>
                           <div class="form-group">
                              <label for="new_password">Nueva Contraseña</label>
                              <input type="password" class="form-control " id="new_password" name="new_password">
                           </div>
                           <div class="form-group">
                              <label for="password_confirmed">Repita la Contraseña</label>
                              <input type="password" class="form-control " id="password_confirmed" name="password_confirmed">
                           </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



              @endif


</div>
