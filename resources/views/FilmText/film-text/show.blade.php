@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Film-text {{ $filmtext->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $filmtext->id }}</td>
                </tr>
                <tr><th> {{ trans('film-text.title') }} </th><td> {{ $filmtext->title }} </td></tr><tr><th> {{ trans('film-text.description') }} </th><td> {{ $filmtext->description }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('FilmText/film-text/' . $filmtext->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Film-text"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['FilmText/film-text', $filmtext->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Film-text',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
@endsection