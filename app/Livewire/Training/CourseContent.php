<?php

namespace App\Livewire\Training;

use Livewire\Component;
use App\Models\Training\Training;
use App\Models\Training\Enrollment;
use Illuminate\Support\Facades\Auth;

class CourseContent extends Component {
    public $training;
    public $selectedMaterial;
    public $completedMaterials = [];

    public function mount(Training $training) {
        $this->training = $training;
        $this->completedMaterials = Auth::user()->courseProgress->where('training_id', $training->id)->pluck('material_id')->toArray();
        $this->selectedMaterial = $this->training->materials()->first();

    }

    public function selectMaterial($materialId) {
        $this->selectedMaterial = $this->training->materials()->find($materialId);
    }

    public function markAsCompleted($materialId) {
        if (!in_array($materialId, $this->completedMaterials)) {
            $this->completedMaterials[] = $materialId;
            Auth::user()->courseProgress->updateOrCreate(
                ['material_id' => $materialId, 'training_id' => $this->training->id],
                ['status' => 'completed']
            );

            if (count($this->completedMaterials) === $this->training->materials()->count()) {
                $this->markTrainingAsCompleted();
            }
        }
    }
    public function loadNextMaterial() {
        $currentIndex = $this->training->materials()->pluck('id')->search($this->selectedMaterial->id);
        $nextIndex = $currentIndex + 1;
        if ($nextIndex < $this->training->materials()->count()) {
            $this->selectedMaterial = $this->training->materials()->get()[$nextIndex];
        } else {
            session()->flash('message', 'You have reached the end of the course materials.');

        }

    }

    public function loadPreviousMaterial() {
        $currentIndex = $this->training->materials()->pluck('id')->search($this->selectedMaterial->id);
        $previousIndex = $currentIndex - 1;

        // Check if the previous index is valid
        if ($previousIndex >= 0) {
            $this->selectedMaterial = $this->training->materials()->get()[$previousIndex];
        } else {
            session()->flash('message', 'No content before this.');
        }
    }

    public function markTrainingAsCompleted() {
        Enrollment::where('user_id', Auth::id())->where('training_id', $this->training->id)->update(['status' => 'completed']);
        $this->dispatchBrowserEvent('trainingCompleted');
    }

    public function render() {
        return view('livewire.training.course-content', [
            'materials' => $this->training->materials,
        ]);
    }
}
