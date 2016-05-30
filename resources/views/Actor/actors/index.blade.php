@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Actors <a href="{{ url('/Actor/actors/create') }}" class="btn btn-primary btn-xs" title="Add New Actor"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('actors.firs_name') }} </th><th> {{ trans('actors.last_name') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($actors as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->firs_name }}</td><td>{{ $item->last_name }}</td>
                    <td>
                        <a href="{{ url('/Actor/actors/' . $item->id) }}" class="btn btn-success btn-xs" title="View Actor"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/Actor/actors/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Actor"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/Actor/actors', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Actor" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Actor',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $actors->render() !!} </div>
    </div>

</div>
@endsection
