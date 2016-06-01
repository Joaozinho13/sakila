@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Film <a href="{{ url('/Film/film/create') }}" class="btn btn-primary btn-xs" title="Add New Film"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('film.title') }} </th><th> {{ trans('film.description') }} </th><th> {{ trans('film.release_year') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($film as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->title }}</td><td>{{ $item->description }}</td><td>{{ $item->release_year }}</td>
                    <td>
                        <a href="{{ url('/Film/film/' . $item->id) }}" class="btn btn-success btn-xs" title="View Film"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/Film/film/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Film"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/Film/film', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Film" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Film',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $film->render() !!} </div>
    </div>

</div>
@endsection
