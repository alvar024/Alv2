@extends('layouts.app2')
@section('content')

{{-- <div class="row">
    <div class="col-lg-12">
        <div class="card card-stats shadow mb-4">
            <div class="card-header pb-0">
                <span class='h5'>@lang('Videos')</span>
                <div class="float-end">
                    <a class="btn bg-gradient-success btn-sm" href="{{ route('videos.create') }}"> @lang('Create New Video') </a>
                </div>
                <form class="pt-3" method="GET" action="">        
                    <div class="d-flex">
                        <div class="form-group mt-4 col-11 mr-4">
                            <div class="">
                                <input name="keyword" value="{{ @$_GET['keyword'] }}" class="form-control" type="search" placeholder="@lang('Buscar Nombre, Apellidos u/o Empresa')...">
                            </div>
                        </div>                                 

                        <div class="form-group d-flex justify-content-end col pl-4">
                            <div class="float-right"><br>
                                <button class="btn btn-primary " type="submit">@lang('Buscar')</button>
                            </div>
                            <div class="float-right"><br>
                                <a href="{{ url('admin/clientes', []) }}" class="btn btn-outline-primary mt-0">@lang('Resetear')</a>
                            </div>
                        </div>

                    </div>
                </form>
                <div class="text-secondary d-flex justify-content-end col text-right text-muted">
                    {{ $data->total()  }} @lang('Register total')
                </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
            @endif
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                     <tr>
                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            <a class="a-app" href="{{ request()->fullUrlWithQuery(['order' => 'id', 'direction' => @$_GET['direction'] == 'asc' ? 'desc' : 'asc']) }} "><i class="fas fa-arrows-alt-v"></i>@lang('No')</a>
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            <a class="a-app" href="{{ request()->fullUrlWithQuery(['order' => 'name', 'direction' => @$_GET['direction'] == 'asc' ? 'desc' : 'asc']) }} "><i class="fa fa-arrows-alt-v"></i>@lang('Name')</a>
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            <a class="a-app" href="{{ request()->fullUrlWithQuery(['order' => 'email', 'direction' => @$_GET['direction'] == 'asc' ? 'desc' : 'asc']) }} "><i class="fa fa-arrows-alt-v"></i>@lang('Email')</a>
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            <a class="a-app" href="{{ request()->fullUrlWithQuery(['order' => 'roll_master', 'direction' => @$_GET['direction'] == 'asc' ? 'desc' : 'asc']) }} "><i class="fa fa-arrows-alt-v"></i>@lang('Roles')</a>
                        </th>
                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="280px">@lang('Action')</th>
                     </tr>
                     @foreach ($data as $key => $user)
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                          @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                               <label class="badge bg-gradient-info">{{ $v }}</label>
                            @endforeach
                          @endif
                        </td>
                        <td>
                           <a class="btn bg-gradient-warning btn-sm" data-toggle="tooltip" data-original-title="@lang('Edit user')" href="{{ url('videos/create?id='.$user->id) }}">@lang('Ver y Editar')</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['videos.destroy', $user->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn bg-gradient-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                      </tr>
                     @endforeach
                    </table>
                </div>
            </div>
            <div class="card-footer">
                  {{ $data->links() }}
                
            </div>
        </div>
    </div>
</div> --}}

@livewire('video-list')
@endsection