<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'image',
        'priority',
        'os',
        'soft_id',
        'user_id'
    ];

    public function client(){
        return $this->BelongsTo(Client::class);
    }
}
