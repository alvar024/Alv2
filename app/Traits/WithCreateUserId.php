<?php 
namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait WithCreateUserId
{
    protected static function boot()
    {
        parent::boot();
        if(Auth::id()){
            self::creating(function ($model) {
                $model->created_user_id = Auth::id();
            });
        }
    }
}
