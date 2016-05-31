@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Address <a href="{{ url('/Address/address/create') }}" class="btn btn-primary btn-xs" title="Add New Address"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('address.address') }} </th><th> {{ trans('address.number') }} </th><th> {{ trans('address.complement') }} </th><th> {{ trans('address.city_id') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($address as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->address }}</td><td>{{ $item->number }}</td><td>{{ $item->complement }}</td><td>{{ $item->city->city }}</td>
                    <td>
                        <a href="{{ url('/Address/address/' . $item->id) }}" class="btn btn-success btn-xs" title="View Address"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/Address/address/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Address"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/Address/address', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Address" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Address',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $address->render() !!} </div>
    </div>

</div>
@endsection
