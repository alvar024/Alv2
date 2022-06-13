@extends('layouts.app2')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 mx-4">
            <div class="card-header pb-0">
                <span class='h5'>@lang('Create New Role')</span>
                <div class="float-end">
                    <a class="btn bg-gradient-success btn-sm" href="{{ route('roles.index') }}"> @lang('Back') </a> 
                </div> 
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Something went wrong.<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
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
                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br/>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn bg-gradient-primary">@lang('Submit')</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection