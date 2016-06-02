@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Store <a href="{{ url('/Store/store/create') }}" class="btn btn-primary btn-xs" title="Add New Store"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('store.manager_staff_id') }} </th><th> {{ trans('store.address_id') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($store as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->manager_staff->first_name }} {{ $item->manager_staff->last_name }}</td><td>{{ $item->address->address }} , {{ $item->address->number }}</td>
                    <td>
                        <a href="{{ url('/Store/store/' . $item->id) }}" class="btn btn-success btn-xs" title="View Store"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/Store/store/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Store"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/Store/store', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Store" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Store',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $store->render() !!} </div>
    </div>

</div>
@endsection
