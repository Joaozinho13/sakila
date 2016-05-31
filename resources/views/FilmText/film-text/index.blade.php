@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Film-text <a href="{{ url('/FilmText/film-text/create') }}" class="btn btn-primary btn-xs" title="Add New Film-text"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('film-text.title') }} </th><th> {{ trans('film-text.description') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($filmtext as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->title }}</td><td>{{ $item->description }}</td>
                    <td>
                        <a href="{{ url('/FilmText/film-text/' . $item->id) }}" class="btn btn-success btn-xs" title="View Film-text"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/FilmText/film-text/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Film-text"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/FilmText/film-text', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Film-text" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Film-text',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $filmtext->render() !!} </div>
    </div>

</div>
@endsection
