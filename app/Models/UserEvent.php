<?php

namespace App\Models;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'status',        
    ];
    public function users(){
        return $this->hasMany(User::class);
    }
    public function events(){
        return $this->hasMany(Event::class);
    }
}
