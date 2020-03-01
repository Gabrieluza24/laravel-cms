@include('layouts.mainheader')
@include('layouts.main-layout')
@include('layouts.mainfooter')

<div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Nuevo despacho de combustible</h4>
                  </div>
                  <div class="card-body">
                      <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="custom-nav-datos" role="tabpanel" aria-labelledby="custom-nav-datos-tab">
                        
                        <form action="{{ route('gestiones.store')}}" method="POST">
                          @csrf
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputcar">Seleccione un Transporte</label>
                          <select id="transporte" name="transporte" class="form-control">
                                <option value="">--</option>
                                @foreach( $transportes as $transporte)
                                <option value="{{ $transporte->placa }}">{{ $transporte->marca }} {{ $transporte->modelo }} ({{ $transporte->placa }})</option>
                                @endforeach
                          </select>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputcar">Seleccione la Estacion de Servicio</label>
                          <select id="estacion" name="estacion" class="form-control">
                                <option value="">--</option>
                                @foreach( $estaciones as $estacion)
                                <option value="{{ $estacion->rif }}">{{ $estacion->nombre }} </option>
                                @endforeach
                          </select>
                        </div>
                        </div>
                       <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputcar">Indique una fecha de recepcion</label>
                           <input type="date" id="fecha" name="fecha" class="form-control" placeholder="DD/MM/AAAA">
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputcar">Seleccione la Cantidad de litros a enviar</label>
                          <select id="litros" name="litros" class="form-control">
                                        @for ($i=0; $i<36001; $i=$i+1000);
                                            <option>{{$i}}</option>
                                        @endfor
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
