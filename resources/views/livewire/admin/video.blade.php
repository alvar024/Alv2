<div class="container">
@section('title',__('Create Video'))
    <div x-data="main_video()">
        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="col">
                    <form wire:submit.prevent="saveContact(Object.fromEntries(new FormData($event.target)))" autocomplete="off">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <p class=" h4 text-black font-weight-bold mb-0 text-primary">Fotografía</p>
                                        <div><small><span class="text-danger"> <abbr title="@lang('Recomendación de imagen') 1200 x 720px 2MB max">1200 x 720px 2MB Max</abbr> </span></small></div>
                                    </div>
                                    <div>
                                        <label for="image">
                                            <img style="width: 50vh; height: 22vh; object-fit: cover; border-radius: 5px; cursor: pointer;" class=" object-fit-cover img-thumbnail" width="100%" height="150px" src="{{ $img_video }}" />
                                            <input id="image" class="d-none" type="file" wire:model="image">

                                            <div wire:loading.block wire:target="image">

                                                <div class="text-primary font-weight-bold text-center my-2">
                                                    <div> <i class="fas fa-circle-notch fa-spin"></i> Uploading...</div>
                                                </div>
                                            </div>

                                        </label>
                                        @error('image') <div class=" text-center m-2"><small class="text-danger font-weight-bold">{{ $message }}</small> </div>@enderror
                                    </div>


                                </div>

                                <div class="card mt-2">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">@lang('Historico de cambios')</h5>

                                        <div class="">
                                            <div wire:loading wire:target="historicos">
                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                @lang('Loading')...
                                            </div>
                                        </div>


                                        <ul class="list-group">
                                            @if($video->id)
                                                @foreach ($historicos as $item)

                                                <li class="list-group-item {{ $item->id == $video->id  ? 'bg-primary-300':'' }}  ">
                                                    <div>



                                                        <div><a class="{{ $item->id == $video->id ? 'text-primary':'' }} " style="font-size: 12px" wire:click.prevent='verHistorico("{{ $item->id }}")' href=""> (#{{ $item->id  }}) {{ $item->created_at }}</a></div>
                                                        <div>
                                                            <span class="badge bg-gradient-info"> {{ $item->status }} </span>
                                                            
                                                        </div>
                                                    </div>

                                                </li>

                                                @endforeach
                                            @endif
                                        </ul>

                                    </div>
                                </div>
                            </div> 

                            <div class="col-8">
                                <div class="card card-body">
                                    <div class="form-group">
                                        <label for="name"><span  class="text-danger">
                                        *</span>@lang('Title')</label>
                                        <input type="text" wire:model.defer="title" autofocus required name="title" class="form-control" id="title" aria-describedby="@lang('Title')">
                                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="name"><span  class="text-danger">
                                        *</span>@lang('Url del Video')</label>
                                        <input type="text" type="url" wire:model.defer="url_video" autofocus required name="url_video" class="form-control" id="url_video" aria-describedby="@lang('Url Video')">
                                        @error('url_video') <span class="text-danger">{{ $message }}</span> @enderror

                                    </div>

                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="category"><span  class="text-danger">
                                        *</span>@lang('Categoria')</label>
                                            <div class="@error('category') error-select @enderror">
                                                <div wire:ignore>
                                                    <select wire:model.lazy="category_id" name="category" required title="Rol del usuario" class="selectpicker form-control" data-size="10" data-width="100%" data-live-search="true" data-style="btn-white">
                                                        @foreach (categorias() as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">


                                            <template x-if="caracter > 600">
                                                <div class="alert alert-danger font-weight-bold" role="alert">
                                                    @lang('Máximo carácteres permitido')
                                                </div>
                                            </template>

                                            <div class="form-group">
                                                <div class="d-flex justify-content-between">
                                     <label for="description">
                                        <span  class="text-danger">
                                        *</span>@lang('Descripcion del proyecto')</label>
                                                    <div class=" font-weight-bold text-gray-500"><span
                                                            x-text="caracter"></span>
                                                       @lang('/600 carácteres') </div>

                                                </div>
                                                <textarea {{ $edit ? 'disabled':'' }} @keyup="changeCaracter()"
                                                    name="description" id="description" wire:model.defer="description"
                                                    class=" form-control @error('description') is-invalid @enderror"
                                                    cols="30" rows="10"></textarea>
                                                @error('description') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                                     
                        </div>
                        <div class="text-right">
                            <button wire:loading.attr="disabled" id="submit" class="btn btn-{{ $video->id ? 'warning' :'primary' }} mt-2" type="submit">{{ $video->id ? __('Editar') : __('Crear') }} @lang('Video')</button>

                        </div>

                    </form>
                    
                </div>    
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">

     document.addEventListener('alpine:changeCaracter', () => {
        Alpine.data('main_video', () => ({
            caracter: $('#description').val().length,
            changeCaracter: function () {
                this.caracter = $('#description').val().length
            }
        }))
    })
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
@endpush