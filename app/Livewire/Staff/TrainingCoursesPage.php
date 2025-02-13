<?php

namespace App\Livewire\Staff;

use App\Models\Training\Enrollment;
use App\Models\Training\Training;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class TrainingCoursesPage extends Component
{


    public function index(){
        return view('staff.training.courses');
    }

    public function show($course_id){
        $training = Training::findOrFail(Crypt::decrypt($course_id));
        return view('staff.training.show-course', compact('training'));
    }



    public function render()
    {
        $trainings = Training::query()->paginate(6);
        $userEnrollments = Enrollment::where('user_id', Auth::id())->pluck('training_id')->toArray();

        return view('livewire.staff.training-courses-page', compact('trainings', 'userEnrollments'));

    }
}
