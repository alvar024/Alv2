<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Livewire\Component;
use Str;
use Spatie\Permission\Models\Permission;

use App\Models\User as ModelUser;
use App\Models\Session as UsersLog;
use Auth;

class Profile extends Component
{   

    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $photo,$search;
    public $img_user;
    public $image;
    public $image_url;
    public $user;


    protected $rules = [
        'user.name'                   => 'nullable',
        'user.email_verified_at'      => 'nullable',
        'user.email'                  => 'nullable',
        'user.profile_photo_path'     => 'nullable',
        'user.roll_master'            => 'nullable',
    ];

    public function mount(Request $request)
    {
        $this->img_user = url('no-profile.png');
        $this->user  = Auth::user();

        $this->user->password = Str::random(10);
        $this->chan_pass         = Str::random(10);
        $this->password          = Str::random(10);
        $this->img_user =  ($this->user->profile_photo_path === null ? url('no-profile.png') : url($this->user->profile_photo_path));
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024', //1MB
        ]);

        $this->image_url = $this->image->store('photos-profile', 'public');
        $this->img_user  = '/storage/' . $this->image_url;
        $this->emit('refreshComponent');
    }

    public function saveContact(){
        $mensaje = ($this->user->id) ? 'Editado' : 'Creado';

         if ($this->img_user) {
            $this->user->profile_photo_path = $this->img_user;
        }
        if ($mensaje === 'Creado') {
            $this->validate([
                'user.email' => 'required|email|unique:users,email',
            ]);
        }

        if ($mensaje === 'Editado') {
            $this->validate([
                'user.email' => 'required|email|unique:users,email,' . $this->user->id,
            ]);
        }
        $this->user->password = $this->password;
        

        $this->user->assignRole([$this->user->roll_master]);
        $this->user->syncRoles([$this->user->roll_master]);
        $this->user->save();

        $this->dispatchBrowserEvent('save', ['name' => $this->user->name, 'title' => $mensaje . ' Usuario']);

        return redirect()->back();

    }
    public function generatePW()
    {
        $this->chan_pass = Str::random(8);

    }

    public function changePw()
    {

        
        $this->user->password = Hash::make($this->chan_pass);
        $this->user->update();

        // $data['dirigido'] = $this->user->name;
        // $data['email']    = $this->user->email;
        // $data['password'] = $this->chan_pass;

        // if ($this->chan_noti) {
        //     # code...

        //     Mail::send('mail.nuevo-usuario', $data, function ($message) {

        //         $message->to($this->user->email, $this->user->name);

        //         $message->subject('Cambio de contraseña  ' . env('APP_NAME'));

        //     });
        // }

        $this->dispatchBrowserEvent('save', ['name' => $this->user->name, 'title' => 'Cambio de contraseña realizada con éxito']);

    }


    public function render()
    {
        $logs = UsersLog::whereUserId($this->user->id)->whereNotNull('user_id')->orderBy('id', 'Desc')->paginate(10);
        return view('livewire.profile',compact('logs'))->layout('layouts.app');
    }
}
