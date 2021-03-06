@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Actor {{ $actor->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $actor->id }}</td>
                </tr>
                <tr><th> {{ trans('actors.first_name') }} </th><td> {{ $actor->first_name }} </td></tr><tr><th> {{ trans('actors.last_name') }} </th><td> {{ $actor->last_name }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('Actor/actors/' . $actor->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Actor"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['Actor/actors', $actor->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Actor',
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