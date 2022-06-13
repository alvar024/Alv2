@extends('layouts.app2')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 mx-4">
            <div class="card-header pb-0">
                <span class='h5'>@lang('Show User')</span>
                <div class="float-end">
                    <a class="btn bg-gradient-success btn-sm" href="{{ route('users.index') }}"> @lang('Back') </a>
                </div> 
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>@lang('Name'):</strong>
                            {{ $user->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>@lang('Email'):</strong>
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>@lang('Roles'):</strong>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge bg-gradient-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection