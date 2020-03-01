@include('layouts.mainheader')
@include('layouts.main-layout')
@include('layouts.mainfooter')

<div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Realizar Solicitud de Combustible</h4>
                  </div>
                  <div class="card-body">
                      <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="custom-nav-datos" role="tabpanel" aria-labelledby="custom-nav-datos-tab">
                        
                        <form action="{{ route('solicitudes.store')}}" method="POST">
                          @csrf
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputcar">Seleccione el Vehiculo</label>
                          <select id="car" name="car" class="form-control">
                                <option value="">--</option>
                                @foreach( $cars as $car)
                                
                                <option value="{{ $car->placa }}">{{ $car->marca }} {{ $car->modelo }} ({{ $car->placa }})</option>
                                @endforeach
                          </select>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="input">Seleccione la Estacion de Servicio</label>
                          <select id="estacion" name="estacion" class="form-control">
                                <option value="">--</option>
                                @foreach( $estaciones as $estacion)
                                <option value="{{ $estacion->rif }}">{{ $estacion->nombre }} </option>
                                @endforeach
                          </select>
                        </div>
                        </div>
                   		<button type="submit" class="btn btn-primary">Aceptar</button>
                    </form>
				</div>
				</div>
			</div>
		</div>
</div>
