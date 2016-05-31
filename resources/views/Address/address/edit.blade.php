@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Address {{ $address->id }}</h1>

    {!! Form::model($address, [
        'method' => 'PATCH',
        'url' => ['/Address/address', $address->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                {!! Form::label('address', trans('address.address'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('address', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number') ? 'has-error' : ''}}">
                {!! Form::label('number', trans('address.number'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('number', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('number', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('complement') ? 'has-error' : ''}}">
                {!! Form::label('complement', trans('address.complement'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('complement', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('complement', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('district') ? 'has-error' : ''}}">
                {!! Form::label('district', trans('address.district'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('district', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('district', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('city_id') ? 'has-error' : ''}}">
                {!! Form::label('city_id', trans('address.city_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('city_id', $city, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('city_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_code') ? 'has-error' : ''}}">
                {!! Form::label('postal_code', trans('address.postal_code'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('postal_code', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('postal_code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
                {!! Form::label('location', trans('address.location'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('location', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
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