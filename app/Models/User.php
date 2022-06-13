<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, HasProfilePhoto;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function getLogoUrlAttribute()
    {
        return $this->profile_photo_path
        ? url('storage/' . $this->profile_photo_path)
        : $this->defaultProfilePhotoUrl();
    }
    public function getRole(){
        switch ($this->roll_master) {
            case 1:
                return __('Administrador');
            case 2:
                return __('Estudiantes');
            case 3:
                return __('Profesor');
            default:
                return __('Nada');
        }
    }
    protected function defaultProfilePhotoUrl()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
    }
}
