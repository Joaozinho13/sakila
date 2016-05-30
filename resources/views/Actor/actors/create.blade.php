@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New Actor</h1>
    <hr/>

    {!! Form::open(['url' => '/Actor/actors', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('firs_name') ? 'has-error' : ''}}">
                {!! Form::label('firs_name', trans('actors.firs_name'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('firs_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('firs_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
                {!! Form::label('last_name', trans('actors.last_name'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('last_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection