<?php

namespace App\Livewire\Training\Components;

use App\Models\Training\Enrollment;
use App\Models\Training\Training;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class EnrollButton extends Component
{
    public $training;
    public $isEnrolled = false;

    public function mount($training)
    {
        $this->training = Training::findOrFail(Crypt::decrypt($training));
        $this->checkEnrollment();
    }

    public function checkEnrollment()
    {
        $this->isEnrolled = Enrollment::where('user_id', Auth::user()->id)
                                      ->where('training_id', $this->training->id)
                                      ->exists();
    }

    public function enroll()
    {
        if (!$this->isEnrolled) {
            Enrollment::create([
                'user_id' => Auth::user()->id,
                'training_id' => $this->training->id,
                'status' => 'approved',
                'enrolled_at' => now(),
            ]);

            // Update state
            $this->isEnrolled = true;

            // Flash success message
            redirect()->back()->session()->flash('success', 'You have successfully enrolled!');
        } else {
            session()->flash('error', 'You are already enrolled in this course.');
        }
    }
    public function render()
    {

        return view('livewire.training.components.enroll-button');
    }
}
