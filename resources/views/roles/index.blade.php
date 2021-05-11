@include('_partials/header')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong class="text-center">{{ session('success') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong class="text-center">{{ session('error') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif
            <h2 class="mt-3 mb-3">Roles</h2>
            @if(count($roles) == 0)
                <h4 class="text-center mt-5">No existen roles</h4>
            @else
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>
                            <a href="{{route('roles.show', $role)}}" class="edit-text">{{$role->code}}</a>
                        </td>
                        <td>{{$role->name}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{route('roles.edit', $role)}}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <form action="{{route('roles.destroy', $role)}}" method="POST" id="{{$role->id}}">
                                @method("delete")
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Estás seguro que quieres eliminar este rol? Se eliminaran todos los usuarios que tengan asignado este rol.')">
                                    Borrar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div id="paginator" class="pagination">
                {!!$roles->render()!!}
            </div>
            @endif
        </div>
    </div>
</div>

@include('_partials/footer')