<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{
    use HasFactory;
    
    public function services()
    {
        return $this->hasOne(Service::class, 'id');
    }

    public function serviceExtra()
    {
        return $this->hasOne(serviceExtra::class, 'id');
    }
}
