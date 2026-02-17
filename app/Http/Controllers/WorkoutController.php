<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Workout;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function index()
    {
        $today = Carbon::now();
        $dayOfWeek = $today->dayOfWeek; // 0=Sun, 1=Mon, 2=Tue, 3=Wed, 4=Thu, 5=Fri, 6=Sat

        // Mapping based on your specific schedule
        $workoutType = match($dayOfWeek) {
            0, 3 => 'upper',
            1, 4 => 'lower',
            default => null,
        };

        // If it's a rest day, show all exercises so you can still log a workout
        // If it's a workout day, show only that type
        if ($workoutType) {
            $dailyExercises = Exercise::where('type', $workoutType)->get();
        } else {
            $dailyExercises = Exercise::all();
        }

        // Always fetch all exercises for the chart dropdown
        $allExercises = Exercise::all();

        $workouts = Workout::with('exercise')
            ->orderBy('date', 'desc')
            ->get()
            ->groupBy(fn($w) => $w->date->format('Y-m-d'));

        $chartData = [];
        foreach ($allExercises as $exercise) {
            $workoutsForExercise = Workout::where('exercise_id', $exercise->id)
                ->orderBy('date')
                ->get();

            $labels = $weights = $estimated1rm = [];

            foreach ($workoutsForExercise as $w) {
                $labels[] = $w->date->format('Y-m-d');
                $weights[] = (float) $w->weight;
                $estimated1rm[] = $w->one_rm;
            }

            $chartData[$exercise->id] = [
                'name'    => $exercise->name,
                'labels'  => $labels,
                'weights' => $weights,
                'one_rm'  => $estimated1rm,
            ];
        }

        return view('index', compact(
            'today',
            'workoutType',
            'dailyExercises',
            'allExercises',
            'workouts',
            'chartData'
        ));
    }


    public function store(Request $request) {
        $request->validate([
            'date' => 'required|date',
            'exercise_id' => 'required|exists:exercises,id',
            'weight' => 'required|numeric|min:0',
            'reps' => 'required|integer|min:1',
        ]);
        Workout::create($request->all());
        return redirect('/')->with('success', 'Set recorded!');
    }

    public function update(Request $request, Workout $workout) {
        $workout->update($request->validate([
            'weight' => 'required|numeric|min:0',
            'reps' => 'required|integer|min:1',
        ]));
        return redirect('/')->with('success', 'Updated!');
    }

    public function destroy(Workout $workout) {
        $workout->delete();
        return redirect('/')->with('success', 'Deleted!');
    }
}
