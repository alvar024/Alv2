@extends('layouts.app2')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card mb-4 mx-4">
            <div class="card-header pb-0">
                <span class='h5'>@lang('Role Management')</span>
                <div class="float-end">
                    @can('role-create')
                        <a class="btn bg-gradient-success btn-sm" href="{{ route('roles.create') }}"> @lang('Create New Role') </a>
                    @endcan
                </div> 
                @if ($message = Session::get('success'))
                    <div class="alert alert-success text-white">
                        <p>{{ $message }}</p>
                    </div>
                @endif
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('Name')</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="280px">@lang('Action')</th>
                        </tr>
                        @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a class="btn bg-gradient-info btn-sm" href="{{ route('roles.show',$role->id) }}">@lang('Show')</a>
                                @can('role-edit')
                                    <a class="btn bg-gradient-primary btn-sm" href="{{ route('roles.edit',$role->id) }}">@lang('Edit')</a>
                                @endcan
                                @can('role-delete')
                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn bg-gradient-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{!! $roles->render() !!}
@endsection