@include('layouts.mainheader')
@include('modal_transportes')
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
                                                <th>Chofer</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transportes as $transporte)
                                            <tr> 
                                                <td>{{ $transporte->placa }}</td>
                                                <td>{{ $transporte->marca }}</td>
                                                <td>{{ $transporte->modelo }}</td>
                                                <td>{{ $transporte->anno }}</td>
                                                <td>{{ $transporte->chofer }}</td>
                                                <td>
                                                    <div class="table-data-feature">  

                                                        <form action="{{ route('transportes.edit', $transporte->placa )}}">
                                                            @csrf
                                                            <button type="button" class="item" data-placa="{{$transporte->placa}}" data-marca="{{$transporte->marca}}" data-modelo="{{$transporte->modelo}}" data-anno="{{$transporte->anno}}" data-chofer="{{$transporte->chofer}}"data-placement="top" data-toggle="modal" data-target="#editarTransporte" >
                                                                <i class="zmdi zmdi-edit"> </i>
                                                            </button>
                                                        </form>
                                                        
                                                  

                                                         <form action="{{ route('transportes.destroy',$transporte->placa)}}" method="post">
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

                                <form action="{{ route('transportes.create')}}">
                                @csrf
                                <button type="button" class="au-btn au-btn-icon au-btn--blue au-btn--small" data-toggle="modal" data-target="#crearTransporte">
                                            <i class="zmdi zmdi-plus"></i>Nuevo
                                </button>
                                </form>
                                </div>
                                <!-- END DATA TABLE-->
                                 
                        </div>
</div>

<script>

    $('#editarTransporte').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget)
  var placa = button.data('placa')
  var marca = button.data('marca')
  var modelo = button.data('modelo')
  var anno = button.data('anno')
  var chofer = button.data('chofer')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

  var modal = $(this)
  modal.find('.modal-body #placa').val(placa)
  modal.find('.modal-body #key').val(placa)
  modal.find('.modal-body #marca').val(marca)
  modal.find('.modal-body #modelo').val(modelo)
  modal.find('.modal-body #anno').val(anno)
  modal.find('.modal-body #chofer').val(chofer)

})
</script>