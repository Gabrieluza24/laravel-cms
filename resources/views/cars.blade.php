@include('layouts.mainheader')
@include('modal_cars')
@include('layouts.main-layout')
@include('layouts.mainfooter')

 <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table id="datatable"class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Placa</th>
                                                <th>Marca</th>
                                                <th>Modelo</th>
                                                <th>Año</th>
                                                <th>Capacidad</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cars as $car)
                                            <tr>
                                                <td>{{ $car->placa }}</td>
                                                <td>{{ $car->marca }}</td>
                                                <td>{{ $car->modelo }}</td>
                                                <td>{{ $car->anno }}</td>
                                                <td>{{ $car->capacidad }} litros</td>
                                                <td>
                                                    <div class="table-data-feature">  

                                                        <form action="{{ route('cars.edit',$car->placa)}}">
                                                            @csrf
                                                            <button type="button" class="item" data-placa="{{$car->placa}}" data-marca="{{$car->marca}}" data-modelo="{{$car->modelo}}" data-anno="{{$car->anno}}" data-capacidad="{{$car->capacidad}}"data-placement="top" data-toggle="modal" data-target="#editarAuto" >
                                                                <i class="zmdi zmdi-edit">  </i>
                                                            </button>
                                                        </form>
                                                        
                                                        </button>

                                                         <form action="{{ route('cars.destroy',$car->placa)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="item" type="submit" data-placement="top" title="Delete">
                                                                <i class="zmdi zmdi-delete"> </i>
                                                            </button>
                                                         </form>

                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-data__tool-right" style="float:right">

                                <form action="{{ route('cars.create')}}">
                                @csrf
                                <button type="button" class="au-btn au-btn-icon au-btn--blue au-btn--small" data-toggle="modal" data-target="#crearAuto">
                                            <i class="zmdi zmdi-plus"></i>Nuevo
                                </button>
                                </form>
                                </div>
                                <!-- END DATA TABLE-->
                                 
                        </div>
</div>

<script>

    $('#editarAuto').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget)
  var placa = button.data('placa')
  var marca = button.data('marca')
  var modelo = button.data('modelo')
  var anno = button.data('anno')
  var capacidad = button.data('capacidad')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

  var modal = $(this)
  modal.find('.modal-body #placa').val(placa)
  modal.find('.modal-body #key').val(placa)
  modal.find('.modal-body #marca').val(marca)
  modal.find('.modal-body #modelo').val(modelo)
  modal.find('.modal-body #anno').val(anno)
  modal.find('.modal-body #capacidad').val(capacidad)

})
</script>