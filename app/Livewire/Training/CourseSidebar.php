<?php

namespace App\Livewire\Training;

use Livewire\Component;
use App\Models\Training\Training;

class CourseSidebar extends Component {
    public $training;

    public function mount(Training $training) {
        $this->training = $training;

    }

    public function loadMaterial($materialId) {
        $this->dispatch('materialSelected', $materialId);
    }

    public function render() {
        return view('livewire.training.course-sidebar', [
            'materials' => $this->training->materials,
        ]);
    }
}
