<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercise;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // UPPER DAY
        $upperExercises = [
            'Wide Grip Row',
            'Shoulder Press',
            'Lat Pulldown',
            'Wide Grip Pulldown',
            'Reverse Grip Curl',
            'Cable Bicep Curl',
            'Tricep Extension',
            'Incline Chest Press',
            'Flat Bench Press',
            'Dumbbell Incline Press',
            'Smith Machine Chest Fly',
            'Machine Lateral Chest Fly',
            'Rear Delts Fly',
            'Low to High Fly',
            'Pullover',
            'Kelso Rear Delt',
            'Chest Press',
            'Flat Bench',
        ];

        foreach ($upperExercises as $name) {
            Exercise::create([
                'name' => $name,
                'type' => 'upper'
            ]);
        }

        // LOWER DAY
        $lowerExercises = [
            'Smith Machine Squat',
            'Hack Squat Machine',
            'Leg Press',
            'Isolated Seated Hamstring Curl',
            'Stiff Leg Deadlift (SLDL)',
            'Jefferson Curl',
            'Leg Extension',
            'Smith Squat',
            'Hip Extension',
            'Standing Calf Raise',
            'Forearm Curl',
        ];

        foreach ($lowerExercises as $name) {
            Exercise::create([
                'name' => $name,
                'type' => 'lower'
            ]);
        }
    }
}
