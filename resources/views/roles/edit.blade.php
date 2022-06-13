@extends('layouts.app2')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <span class='h5'>@lang('Edit Role')</span>
                <div class="float-end">
                    <a class="btn bg-gradient-success btn-sm" href="{{ route('roles.index') }}">@lang('Back')</a>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger text-white p-4 m-4">
                        <strong>@lang('Whoops')!</strong> @lang('something went wrong').<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="card-body">
                {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>@lang('Name'):</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>@lang('Permission'):</strong>
                            <br/>
                            @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br/>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>

@endsection