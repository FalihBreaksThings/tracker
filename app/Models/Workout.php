<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $fillable = [
        'date',
        'exercise_id',
        'weight',
        'reps',
        ];
    protected $casts = [
        'date' => 'date',
    ];

    /**
     * Get the exercise this workout belongs to
     */
    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
    public function getOneRmAttribute() {
        if ($this->reps <= 0 || $this->reps >= 37) return $this->weight;
        return round($this->weight * (36 / (37 - $this->reps)), 1);
    }
}
