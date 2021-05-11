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
            <h2 class="mt-3 mb-3">Usuarios</h2>
            @if(count($users) == 0)
                <h4 class="text-center mt-5">No existen usuarios</h4>
            @else
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th>Apellido</th>
                    <th class="d-none d-sm-none d-md-table-cell">Nombre</th>
                    <th class="d-none d-sm-none d-md-table-cell">Edad</th>
                    <th class="d-none d-sm-none d-md-table-cell">Email</th>
                    <th class="d-none d-sm-none d-md-table-cell">Teléfono</th>
                    <th>Rol</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <a href="{{route('users.show', $user)}}" class="edit-text">{{$user->last_name}}</a>
                        </td>
                        <td class="d-none d-sm-none d-md-table-cell">{{$user->first_name}}</td>
                        <td class="d-none d-sm-none d-md-table-cell">{{$user->date_of_birth}}</td>
                        <td class="d-none d-sm-none d-md-table-cell">{{$user->email}}</td>
                        <td class="d-none d-sm-none d-md-table-cell">{{$user->phone}}</td>
                        <td>
                            <a href="{{route('roles.edit', $user->role)}}" class="edit-text">{{$user->role->code}} - {{$user->role->name}}</a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{route('users.edit', $user)}}" >
                                Editar
                            </a>
                        </td>
                        <td>
                            <form action="{{route('users.destroy', $user)}}" method="POST" id="{{$user->id}}">
                                @method("delete")
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Estás seguro que quieres eliminar este usuario?')">
                                    Borrar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div id="paginator" class="pagination">
                {!!$users->render()!!}
            </div>
            @endif
        </div>
    </div>
</div>

@include('_partials/footer')