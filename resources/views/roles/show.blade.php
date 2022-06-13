@extends('layouts.app2')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="card mb-4 mx-4">
            <div class="card-header pb-0">
                <span class='h5'>@lang('Show Role')</span>
                <div class="float-end">
                    <a class="btn bg-gradient-success btn-sm" href="{{ route('roles.index') }}"> @lang('Back') </a> 
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>@lang('Name'):</strong>
                            {{ $role->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>@lang('Permissions'):</strong>
                            @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                                    <label class="label label-success">{{ $v->name }},</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection