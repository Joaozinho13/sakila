@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Staff {{ $staff->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $staff->id }}</td>
                </tr>
                <tr><th> {{ trans('staff.first_name') }} </th><td> {{ $staff->first_name }} </td></tr><tr><th> {{ trans('staff.last_name') }} </th><td> {{ $staff->last_name }} </td></tr><tr><th> {{ trans('staff.address_id') }} </th><td> {{ $staff->address->address }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('Staff/staff/' . $staff->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Staff"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['Staff/staff', $staff->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Staff',
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