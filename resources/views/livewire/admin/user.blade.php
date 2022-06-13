<div>
@section('title',__('Crear usuario'))

    <div class="row">
        <div class="d-flex justify-content-center">
            <div class="col-md-8">

                <div class="card card-body">

                    <form wire:submit.prevent="saveContact(Object.fromEntries(new FormData($event.target)))" autocomplete="off">

                        <div class=" ">
                            <div class="d-flex justify-content-center ">

                                <div>
                                    <label for="image">
                                        <img style="cursor: pointer;" class="rounded-circle object-fit-cover" width="100" height="100" src="{{ $img_user }}" />
                                        <input id="image" class="d-none" type="file" wire:model="image">
                                        <div class="text-primary font-weight-bold" wire:loading wire:target="image">Uploading...</div>

                                    </label>
                                    @error('image') <div><small class="text-danger font-weight-bold">{{ $message }}</small> </div>@enderror

                                </div>



                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" wire:model.defer="user.name" autofocus required name="name" value="" class="form-control" id="name" aria-describedby="Nombre">
                            @error('user.name') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>



                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" name="email" required autocomplete="nope" wire:model.defer="user.email" value="" class="form-control" id="email" aria-describedby="Correo electrónico">
                            @error('user.email') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>



                        <div class="form-group {{ $user->id ? 'd-none':'' }}">

                            <div class="d-flex justify-content-between">


                                <label for="email">Contraseña(<small class="gray-500">{{ $password }}</small>)</label>

                                <div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input checked class="form-check-input" type="checkbox" name="notification" wire:model.defer='notification' id="notification" value="1">Notificar por email
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="input-group" id="show_hide_password">
                                <input autocomplete="new-password" wire:model.defer="password" name="password" class="form-control " value="" {{ $user->id ? '':'required' }} type="password">

                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md">
                                <div class="form-group">
                                    <label for="roll">Rol del usuario</label>
                                    <div class="@error('roll') error-select @enderror">
                                        <div id="j1iyq" wire:ignore>
                                            <select wire:model.lazy="user.roll_master" name="roll_master" required title="Rol del usuario" class="selectpicker form-control" data-size="10" data-width="100%" data-live-search="true" data-style="btn-white">
                                                @foreach (roles() as $item)
                                                <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('roll') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>

                        </div>

                        <div class="text-right">
                            <button wire:loading.attr="disabled" id="submit" class="btn btn-{{ $user->id ? 'warning' :'primary' }} mt-2" type="submit">{{ $user->id ? 'Editar' :'Crear' }} Usuario</button>

                        </div>



                    </form>




                </div>




                <div class="card card-body">

                    @if ($user->id)

                    <div class="  ">
                        <div class=" ">
                            <h4 class="card-title">Cambiar la contraseña</h4>

                            <form wire:submit.prevent="changePw(Object.fromEntries(new FormData($event.target)))" autocomplete="off">



                                @csrf
                                <div class="form-group">
                                    <label for="email">Contraseña</label>
                                    <small class="gray-500">{{ $chan_pass }}</small>
                                    <div class="input-group" id="show_hide_password">
                                        <input autocomplete="new-password" wire:model.defer="chan_pass" name="password" class="form-control " placeholder="" type="password" value="{{ Str::random(8) }}">
                                        <a name="" id="" wire:click.prevent="generatePW" class="btn btn-outline-primary" href="#" role="button">Generar una contraseña</a>

                                        {{-- <div class="input-group-addon">
                        <a href=""><i class="fa fa-eye-slash   " aria-hidden="true"></i></a>
                    </div> --}}
                                    </div>
                                </div>

                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input checked="" class="form-check-input" type="checkbox" name="notification" wire:model.defer="chan_noti" id="notification" value="1"> Notificar
                                        por email
                                    </label>
                                </div>


                                <div class="form-group text-right">
                                    <button type="submit" wire:loading.attr="disabled" class="btn btn-{{ $user->id ? 'warning' :'primary' }}">Cambiar
                                        contraseña</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>


    </div>


    <div class="row">

        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">History Logs of Session <span wire:loading><i class="fa fa-spinner fa-pulse  fa-fw"></i></span></h4>

                    <div class="table-responsive">
                        <table class="table  table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>ip</th>
                                    <th>ip_address</th>
                                    <th>user_id</th>
                                    <th>payload</th>
                                    <th>user_agent</th>
                                    <th>last_activity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $log)
                                <tr>
                                    <td>
                                        <div>
                                            <b>{{ $log->ip }}</b>
                                        </div>
                                    </td>
                                    <td>{{ $log->ip_address }}</td>
                                    <td>{{ $log->user_id }}</td>
                                    <td>{{ short_string($log->payload,20) }}</td>
                                    <td>{{ $log->user_agent }}</td>
                                    <td>{{ $log->last_activity }}</td>
                                    
                                </tr>

                                @endforeach
                            </tbody>


                        </table>

                        {{ $logs->links() }}

                    </div>

                </div>


            </div>
        </div>
    </div>



    @push('scripts')

   
    <script>


        $(document).ready(function () {
         $('.selectpicker').selectpicker();
        });
        document.addEventListener("DOMContentLoaded", () => {
            //$('.selectpicker').selectpicker('render');
            window.addEventListener('save', (event) => {

                var Toast = Swal.mixin({
                    toast: true
                    , position: 'top-end'
                    , showConfirmButton: false
                    , timer: 3000
                    , timerProgressBar: true
                    , onOpen: function(toast) {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success'
                    , title: 'Successfully saved'
                })

            })
        })

    </script>
    @if ($user->id != null)
    <script>
        document.addEventListener('livewire:load', function() {
          //  $('.selectpicker').selectpicker('render')
            $('[name="roll_master"]').val('{{ $user->roll_master }}');

        })

    </script>
    @endif

    @endpush
</div>
