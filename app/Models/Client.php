<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Database\Eloquent\Model;

class Client extends User
{
    public function ticket(){
        return $this->hasMany(Ticket::class);
    }
}
