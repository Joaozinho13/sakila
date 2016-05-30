@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Language {{ $language->id }}</h1>

    {!! Form::model($language, [
        'method' => 'PATCH',
        'url' => ['/Language/language', $language->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('language_name') ? 'has-error' : ''}}">
                {!! Form::label('language_name', trans('language.language_name'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('language_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('language_name', '<p class="help-block">:message</p>') !!}
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