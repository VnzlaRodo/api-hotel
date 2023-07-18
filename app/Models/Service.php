<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'clients_services');
    }
    
    public function type_services()
    {
        return $this->belongsTo(TypeService::class, 'id_type_service');
    }

    public function lodging()
    {
        return $this->hasOne(Lodging::class);
    }

    public function event()
    {
        return $this->hasOne(Event::class);
    }

    public function service_extra()
    {
        return $this->hasOne(Service_extra::class);
    }

}
