<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lodging extends Model
{
    use HasFactory;

    public function habitations()
    {
        return $this->hasMany(Habitation::class,'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
