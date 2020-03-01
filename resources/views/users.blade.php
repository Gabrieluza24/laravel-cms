@include('layouts.mainheader')
@include('modal_users')
@include('layouts.main-layout')
@include('layouts.mainfooter')

 <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table id="datatable"class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Correo</th>
                                                <th>Cedula</th>
                                                <th>Telefono</th>
                                                <th>Rol</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($personas as $persona)
                                            <tr>
                                                <td>{{ $persona->name}} {{ $persona->lastname }}</td>
                                                <td>{{ $persona->usuario()->pluck('email')->first()}}</td>
                                                <td>{{$persona->tipocedula}}{{ $persona->cedula }}</td>
                                                <td>{{ $persona->telefono }}</td>
                                                <td>{{ $persona->usuario()->get()->first()->roles->pluck('slug')->first()}}</td>
                                                <td>
                                                    <div class="table-data-feature">  
                                                            <form action="{{ route('user.edit',$persona->usuario()->get()->first())}}">
                                                            @csrf
                                                            <button type="button" class="item" 
                                                            data-name="{{$persona->name}}"
                                                            data-lastname="{{$persona->lastname}}" 
                                                            data-cedula="{{$persona->cedula}}" 
                                                            data-tipocedula="{{$persona->tipocedula}}" 
                                                            data-email="{{$persona->usuario()->pluck('email')->first()}}"
                                                            data-telefono="{{$persona->telefono}}"
                                                            data-placement="top" data-toggle="modal" data-target="#editarUsuario" >
                                                                <i class="zmdi zmdi-edit">  </i>
                                                            </button>
                                                            </form>
                                                            <form action="{{ route('user.destroy',$persona->usuario()->get()->first())}}" method="post" class="delete-confirm">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="item" type="submit" data-placement="top" title="Eliminar">
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
                                <!-- END DATA TABLE-->
                                 
                        </div>
</div>

<script>

    $('#editarUsuario').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget)

  var name = button.data('name')
  var lastname = button.data('lastname')
  var cedula = button.data('cedula')
  var tipocedula = button.data('tipocedula')
  var email = button.data('email')
  var telefono = button.data('telefono')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

  var modal = $(this)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #key').val(cedula)
  modal.find('.modal-body #lastname').val(lastname)
  modal.find('.modal-body #cedula').val(cedula)
  modal.find('.modal-body #tipocedula').val(tipocedula)
  modal.find('.modal-body #email').val(email)
  modal.find('.modal-body #telefono').val(telefono)

})

document.querySelector('.delete-confirm').addEventListener('submit', function(e) {
  var form = this;
  e.preventDefault();
  swal({
      title: "Advertencia",
      text: "¿Esta seguro que deseas eliminar este usuario?",
      icon: "warning",
      buttons: [
        'Cancelar',
        'Eliminar'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
          form.submit();
      } else {
      }
    })
});
</script>

