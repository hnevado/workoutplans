<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'coach',
        'athlete',
        'comments_coach',
        'comments_athlete',
        'training_monday',
        'feedback_monday',
        'training_tuesday',
        'feedback_tuesday',
        'training_wednesday',
        'feedback_wednesday',
        'training_thursday',
        'feedback_thursday',
        'training_friday',
        'feedback_friday',
        'training_saturday',
        'feedback_saturday',
        'training_sunday',
        'feedback_sunday',
    ];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'athlete');
    }

}
