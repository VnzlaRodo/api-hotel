<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeHabitation extends Model
{
    use HasFactory;

    public function habitations()
    {
        return $this->hasMany(Habitation::class,'id_type_habitation');
    }
}
