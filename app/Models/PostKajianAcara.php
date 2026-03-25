<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostKajianAcara extends Model
{
    use HasFactory;

    protected $table = 'posts_kajian_acara';


    protected $fillable = [
        'event_name',
        'event_date',
        'start_time',
        'speaker',
        'description',
        'location',
        'is_routine',
    ];
    

    protected $casts = [
        'event_date' => 'date',
        'is_routine' => 'boolean',
    ];
}