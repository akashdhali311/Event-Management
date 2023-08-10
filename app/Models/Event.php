<?php

namespace App\Models;

use App\Models\User;
use App\Models\Event;
use App\Models\Comment;
use App\Models\EventType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;


    protected $fillable = [
        'event_type_id',
        'name',
        'description',
        'location',
        'start_at',
        'end_at',
        'published_at',
        'deleted_at',
        
    ];
    
    public function event(){
        return $this->bilongsTo(Event::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function eventType(){
        return $this->belongsTo(EventType::class);
    }
}
