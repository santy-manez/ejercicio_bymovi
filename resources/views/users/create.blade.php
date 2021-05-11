@include('_partials/header')

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-6 m-auto">
            <h3>Crear Usuario</h3>
            {!! Form::open(array('method' => 'post', 'route' => array('users.store'))) !!}
                @csrf
                <div class="form-group mb-4">
                    <label class="label">Apellido</label>
                    <input required name="last_name" class="form-control" type="text" placeholder="Ingrese apellido (Debe contener solo letras y de entre 2 a 20 caracteres)" value="{{ old('last_name') }}">
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
                    <input required name="first_name" class="form-control" type="text" placeholder="Ingrese nombre (Debe contener solo letras y de entre 2 a 20 caracteres)" value="{{ old('first_name') }}">
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
                    <input required name="date_of_birth" class="form-control" type="date" value="{{ old('date_of_birth') }}" max=<?php $now=date("Y-m-d"); echo $now;?>>
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
                    <input required name="email" class="form-control" type="email" placeholder="Ingrese email" value="{{ old('email') }}">
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
                    <input required name="phone" class="form-control" type="phone" placeholder="Ingrese teléfono, característica sin el 0 y número sin el 15 (Máximo de 10 caracteres)" value="{{ old('phone') }}">
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
                          <option value="{{ old('role_id') }}"></option>
                          @foreach($roles as $role)
                          <option value="{{$role->id}}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{$role->code}} {{$role->name}}</option>
                          @endforeach
                    </select>
                </div>

                <button class="btn btn-success mb-4" type="submit">Guardar</button>
                <a class="btn btn-primary mb-4" href="{{ URL::route('index') }}">Volver al listado</a>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@include('_partials/footer')