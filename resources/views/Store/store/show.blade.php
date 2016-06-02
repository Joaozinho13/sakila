@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Store {{ $store->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $store->id }}</td>
                </tr>
                <tr><th> {{ trans('store.manager_staff_id') }} </th><td> {{ $store->manager_staff->fist_name}} {{ $store->manager_staff->last_name}} </td></tr><tr><th> {{ trans('store.address_id') }} </th><td> {{ $store->address->address }} , {{ $store->address->number }}</td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('Store/store/' . $store->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Store"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['Store/store', $store->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Store',
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