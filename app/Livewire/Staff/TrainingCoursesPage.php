<?php

namespace App\Livewire\Staff;

use App\Models\Training\Training;
use Livewire\Component;

class TrainingCoursesPage extends Component
{
    public function index(){
        return view('staff.training.courses');
    }


    public function render()
    {
        $trainings = Training::all();
        return view('livewire.staff.training-courses-page',compact('trainings'));
    }
}
