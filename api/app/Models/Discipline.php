<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'order',
        'heat_size',
        'relay_size',
        'call_time',
        'meeting_time',
        'length',
    ];

    public function athletes()
    {
        return $this->belongsToMany(Athlete::class)->withPivot('pb', 'pb_date', 'pb_event', 'sb', 'sb_date', 'sb_event');
    }
}
