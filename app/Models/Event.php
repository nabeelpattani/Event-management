<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'event_date', 'max_attendees'];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
