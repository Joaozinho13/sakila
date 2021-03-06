@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit City {{ $city->id }}</h1>

    {!! Form::model($city, [
        'method' => 'PATCH',
        'url' => ['/City/city', $city->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                {!! Form::label('city', trans('city.city'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('city', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('country_id') ? 'has-error' : ''}}">
                {!! Form::label('country_id', trans('city.country_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('country_id', $countries, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('country_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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