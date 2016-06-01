@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New Film</h1>
    <hr/>

    {!! Form::open(['url' => '/Film/film', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                {!! Form::label('title', trans('film.title'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                {!! Form::label('description', trans('film.description'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('release_year') ? 'has-error' : ''}}">
                {!! Form::label('release_year', trans('film.release_year'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('release_year', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('release_year', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('language_id') ? 'has-error' : ''}}">
                {!! Form::label('language_id', trans('film.language_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('language_id', $language, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('language_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('original_language_id') ? 'has-error' : ''}}">
                {!! Form::label('original_language_id', trans('film.original_language_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('original_language_id', $language, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('original_language_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('rental_duration') ? 'has-error' : ''}}">
                {!! Form::label('rental_duration', trans('film.rental_duration'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('rental_duration', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('rental_duration', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('rental_rate') ? 'has-error' : ''}}">
                {!! Form::label('rental_rate', trans('film.rental_rate'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('rental_rate', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('rental_rate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('length') ? 'has-error' : ''}}">
                {!! Form::label('length', trans('film.length'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('length', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('length', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('replacement_cost') ? 'has-error' : ''}}">
                {!! Form::label('replacement_cost', trans('film.replacement_cost'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('replacement_cost', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('replacement_cost', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('rating') ? 'has-error' : ''}}">
                {!! Form::label('rating', trans('film.rating'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('rating', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('rating', '<p class="help-block">:message</p>') !!}
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