<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\WithCreateUserId;
use CArbon\Carbon;
class VideoTimeline extends Model
{
    use HasFactory;
    use WithCreateUserId;

    protected $guarded = [];


    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d M y g:i A');
    }

    public function StatusClientPost()
    {

        $value = 0;
        switch ($this->status_client) {

            case 'Creado':
                $value = 1;
                break;

            case 'Publicado':
                $value = 2;
                break;

            case 'Editado':
                $value = 3;
                break;

            case 'Eliminado':
                $value = 4;
                break;

        }
        return $value;
    }
}
