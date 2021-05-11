<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Ejercicio Bymovi</title>
    </head>
    <body>
        <div class="container-fluid">
        	<h1 class="text-center mt-4 mb-4">Ejercicio Técnico Bymovi</h1>
        	<div class="row">
        	    <div class="col-12">
        	        <a href="{{ URL::route('users.create') }}" class="btn btn-success mb-2">Crear Usuario</a>
        	        <a href="{{ URL::route('roles.create') }}" class="btn btn-success mb-2">Crear Rol</a>
        	        <a href="{{ URL::route('index') }}" class="btn btn-success mb-2">Listado de Usuarios</a>
        	        <a href="{{ URL::route('roles.index') }}" class="btn btn-success mb-2">Listado de Roles</a>
                </div>
            </div>
        </div>