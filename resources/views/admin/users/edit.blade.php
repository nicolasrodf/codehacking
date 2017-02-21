@extends('layouts.admin')


@section('content')

    <h1>Edit Users</h1>


    {{--bootstrap--}}

    <div class="row">

        <div class="col-sm-3">

            <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">


        </div>

        <div class="col-sm-9">

            {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true])!!}
            {{--model($user, ... es para pasar la info del usuario al formulario.--}}

            {{csrf_field()}}

            <div class="form-group">
                {!!  Form::label('name', 'Name:') !!}
                {!!  Form::text('name', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!  Form::label('email', 'Email:') !!}
                {!!  Form::email('email', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!  Form::label('role_id', 'Role:') !!}
                {!!  Form::select('role_id', $roles, null, ['class'=>'form-control'])!!}
                {{--$roles viene del metodo create del controlador--}}
            </div>

            <div class="form-group">
                {!!  Form::label('is_active', 'Status:') !!}
                {!!  Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null , ['class'=>'form-control'])!!}
                {{--El 0 despues de Not Active pone el select en valor 0 (Not Active) por defecto en el formulario!--}}
            </div>

            <div class="form-group">
                {!!  Form::label('photo_id', 'Photo:') !!}
                {!!  Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!  Form::label('password', 'Password:') !!}
                {!!  Form::password('password', ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Edit User', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>

    </div>

    {{--MOstrar errores despuesd el formulario--}}

    <div class="row">

        @include('includes.form_error')

    </div>

@stop