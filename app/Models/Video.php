<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\WithCreateUserId;
class Video extends Model
{
    use HasFactory, SoftDeletes, WithCreateUserId;

    protected $fillable=['name','description','created_user_id','user_id','video','category_id','view','like'];

}
