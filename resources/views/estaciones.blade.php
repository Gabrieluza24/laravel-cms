@include('layouts.mainheader')
@include('modal_estaciones')
@include('layouts.main-layout')
@include('layouts.mainfooter')

            <!-- MAIN CONTENT-->
                     <div class="table-data__tool-right" style="float:right">
                     <form action="{{ route('estaciones.create')}}">
                        @csrf
                       @can('estacionservicio.store')
                        <button type="button" class="au-btn au-btn-icon au-btn--blue au-btn--small" data-toggle="modal" data-target="#crearEstacion">
                          <i class="zmdi zmdi-plus"></i>Agregar
                        </button>
                        @endcan
                      </form>
                      </div>   
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">  
                          @foreach ($estaciones as $estacion)
                            <div class="col-md-4">
                                <div class="card">
                                <button class=" col-md-10 fas fa-close"> </button>
                                    <img class="card-img-top" src="{{asset('assets/images/bg-title-01.jpg')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">{{ $estacion->nombre }}</h4>
                                        <p class="card-text"> {{ $estacion->direccion }} </p>
                                    </div>
                                </div>
                            </div>
                          @endforeach
                        </div>
                    </div>    
                </div>
            </div>
        <!-- END PAGE CONTAINER-->


 