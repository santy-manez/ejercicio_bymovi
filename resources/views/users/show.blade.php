@include('_partials/header')

<div class="container-fluid">
  <div class="row">
      <div class="col-12 col-md-6 m-auto">
          <h3 class="mb-4">Ver Usuario</h3>
          <table class="table text-center">
            <tbody>
              <tr>
                <th scope="row">Apellido</th>
                <td>{{$user->last_name}}</td>
              </tr>
              <tr>
                <th scope="row">Nombre</th>
                <td>{{$user->first_name}}</td>
              </tr>
              <tr>
                <th scope="row">Edad</th>
                <td>{{$user->date_of_birth}}</td>
              </tr>
              <tr>
                <th scope="row">Email</th>
                <td>{{$user->email}}</td>
              </tr>
              <tr>
                <th scope="row">Teléfono</th>
                <td>{{$user->phone}}</td>
              </tr>
              <tr>
                <th scope="row">Rol</th>
                <td>{{$user->role->code}} - {{$user->role->name}}</td>
              </tr>
              <tr>
                <th scope="row">Creado</th>
                <td>{{$user->created_at}}</td>
              </tr>
              <tr>
                <th scope="row">Actualizado</th>
                <td>{{$user->updated_at}}</td>
              </tr>
            </tbody>
          </table>
          <a class="btn btn-primary" href="{{ URL::route('index') }}">Volver al listado de Usuarios</a>
      </div>
  </div>
</div>

@include('_partials/footer')