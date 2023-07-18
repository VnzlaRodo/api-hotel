<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitation extends Model
{
    use HasFactory;

    public function lodging()
    {
        return $this->belongsTo(Lodging::class,'id_lodging');
    }
}
