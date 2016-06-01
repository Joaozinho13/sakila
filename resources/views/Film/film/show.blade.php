@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Film {{ $film->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $film->id }}</td>
                </tr>
                <tr><th> {{ trans('film.title') }} </th><td> {{ $film->title }} </td></tr><tr><th> {{ trans('film.description') }} </th><td> {{ $film->description }} </td></tr><tr><th> {{ trans('film.release_year') }} </th><td> {{ $film->release_year }} </td></tr>
                <tr><th> {{ trans('film.language_id') }} </th><td> {{ $film->language->language_name }} </td></tr>
                <tr><th> {{ trans('film.original_language_id') }} </th><td> {{ $film->original_language->language_name}} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('Film/film/' . $film->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Film"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['Film/film', $film->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Film',
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