@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Address {{ $address->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $address->id }}</td>
                </tr>
                <tr><th> {{ trans('address.address') }} </th><td> {{ $address->address }} </td></tr><tr><th> {{ trans('address.number') }} </th><td> {{ $address->number }} </td></tr><tr><th> {{ trans('address.complement') }} </th><td> {{ $address->complement }} </td></tr><tr><th> {{ trans('address.city_id') }} </th><td> {{ $address->city->city }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('Address/address/' . $address->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Address"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['Address/address', $address->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Address',
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