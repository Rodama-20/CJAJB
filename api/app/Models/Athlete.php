<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    use HasFactory;

    protected $fillable = [
        'fsg_id',
        'first_name',
        'last_name',
        'birth_date',
        'is_men',
        'nationality',
        'email',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
