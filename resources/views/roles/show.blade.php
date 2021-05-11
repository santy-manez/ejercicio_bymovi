@include('_partials/header')

<div class="container-fluid">
  <div class="row">
      <div class="col-12 col-md-6 m-auto">
          <h2 class="mb-4">Ver Rol</h2>
          <table class="table text-center">
            <tbody>
              <tr>
                <th scope="row">Código</th>
                <td>{{$role->code}}</td>
              </tr>
              <tr>
                <th scope="row">Nombre</th>
                <td>{{$role->name}}</td>
              </tr>
              <tr>
                <th scope="row">Creado</th>
                <td>{{$role->created_at}}</td>
              </tr>
              <tr>
                <th scope="row">Actualizado</th>
                <td>{{$role->updated_at}}</td>
              </tr>
            </tbody>
          </table>
          <a class="btn btn-primary" href="{{ URL::route('roles.index') }}">Volver al listado de Roles</a>
      </div>
  </div>
</div>

@include('_partials/footer')