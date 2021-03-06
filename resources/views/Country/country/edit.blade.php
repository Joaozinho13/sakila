@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Country {{ $country->id }}</h1>

    {!! Form::model($country, [
        'method' => 'PATCH',
        'url' => ['/Country/country', $country->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('country_name') ? 'has-error' : ''}}">
                {!! Form::label('country_name', trans('country.country_name'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('country_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('country_name', '<p class="help-block">:message</p>') !!}
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