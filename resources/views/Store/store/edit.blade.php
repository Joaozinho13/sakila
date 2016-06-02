@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Store {{ $store->id }}</h1>

    {!! Form::model($store, [
        'method' => 'PATCH',
        'url' => ['/Store/store', $store->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('manager_staff_id') ? 'has-error' : ''}}">
                {!! Form::label('manager_staff_id', trans('store.manager_staff_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('manager_staff_id', $staff, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('manager_staff_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('address_id') ? 'has-error' : ''}}">
                {!! Form::label('address_id', trans('store.address_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('address_id', $address, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('address_id', '<p class="help-block">:message</p>') !!}
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