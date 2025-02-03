<?php

namespace App\Livewire\Training;

use App\Models\Training\CourseMaterial;
use App\Models\Training\Enrollment;
use App\Models\Training\Training;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Course extends Component
{
    public function show($training_id)
    {

        // Ensure the user is enrolled and their status is "approved" or "completed"
        $training = Training::findOrFail($training_id);
        $enrollment = Auth::user()
            ->enrollments->where('training_id', $training->id)
            ->whereIn('status', ['approved', 'completed'])
            ->first();

        if (!$enrollment) {
            abort(403, 'You are not authorized to access this course.');
        }

        $courseContent = CourseMaterial::where('training_id', $training->id)->get();



        // Access the course materials

        return view('training.course', compact('training', 'enrollment', 'courseContent'));
    }

    public function complete(Training $training)
    {
        $enrollment = Enrollment::where('user_id', Auth::id())->where('training_id', $training->id)->first();

        if (!$enrollment) {
            abort(403, 'You are not enrolled in this course.');
        }

        // Mark course as completed
        $enrollment->update(['status' => 'completed']);

        return redirect()->route('my.trainings', $training->id)->with('success', 'Course marked as completed!');
    }
    public function render()
    {
        return view('livewire.training.course');
    }
}
