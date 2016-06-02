@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Staff <a href="{{ url('/Staff/staff/create') }}" class="btn btn-primary btn-xs" title="Add New Staff"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('staff.first_name') }} </th><th> {{ trans('staff.last_name') }} </th><th> {{ trans('staff.address_id') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($staff as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->first_name }}</td><td>{{ $item->last_name }}</td><td>{{ $item->address->address }}</td>
                    <td>
                        <a href="{{ url('/Staff/staff/' . $item->id) }}" class="btn btn-success btn-xs" title="View Staff"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/Staff/staff/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Staff"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/Staff/staff', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Staff" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Staff',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $staff->render() !!} </div>
    </div>

</div>
@endsection
