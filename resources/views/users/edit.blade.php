@include('_partials/header')

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-6 m-auto">
            <h3>Editar Usuario</h3>
            {!! Form::open(array('method' => 'patch', 'route' => array('users.update', $user))) !!}
                @csrf
                <div class="form-group mb-4">
                    <label class="label">Apellido</label>
                    <input required name="last_name" class="form-control" type="text" placeholder="Apellido" value="{{ $user->last_name }}">
                    @if ($errors->get('last_name'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('last_name') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label class="label">Nombre</label>
                    <input required name="first_name" class="form-control" type="text" placeholder="Nombre" value="{{ $user->first_name }}">
                    @if ($errors->get('first_name'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('first_name') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label class="label">Fecha de Nacimiento</label>
                    <input required name="date_of_birth" class="form-control" type="date" placeholder="Fecha de Nacimiento" value="{{ $user->date_of_birth }}">
                    @if ($errors->get('date_of_birth'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('date_of_birth') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label class="label">Email</label>
                    <input required name="email" class="form-control" type="email" placeholder="Email" value="{{ $user->email }}">
                    @if ($errors->get('email'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('email') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label class="label">Teléfono</label>
                    <input required name="phone" class="form-control" type="phone" placeholder="Teléfono" value="{{ $user->phone }}">
                    @if ($errors->get('phone'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('phone') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label>Rol</label>
                    <select required class="form-control" name="role_id">
                          @foreach($roles as $role)
                          <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{$role->code}} {{$role->name}}</option>
                          @endforeach
                    </select>
                </div>

                <button class="btn btn-success mb-4">Guardar</button>
                <a class="btn btn-primary mb-4" href="{{ URL::route('index') }}">Volver al listado</a>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@include('_partials/footer')