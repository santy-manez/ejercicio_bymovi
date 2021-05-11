@include('_partials/header')

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-6 m-auto">
            <h2>Editar Rol</h2>
            {!! Form::open(array('method' => 'patch', 'route' => array('roles.update', $role))) !!}
                @csrf
                <div class="form-group mb-4">
                    <label class="label">Código</label>
                    <input required name="code" class="form-control" type="number" placeholder="Ingrese el código numérico, por ejemplo: 1" value="{{ $role->code }}">
                    @if ($errors->get('code'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('code') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label class="label">Nombre</label>
                    <input required name="name" class="form-control" type="text" placeholder="Ingrese el nombre, por ejemplo: Admin" value="{{ $role->name }}">
                    @if ($errors->get('name'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('name') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <button class="btn btn-success" type="submit">Guardar</button>
                <a class="btn btn-primary" href="{{ URL::route('roles.index') }}">Volver al listado de Roles</a>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@include('_partials/footer')