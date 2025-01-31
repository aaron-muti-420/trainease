<?php

namespace App\Livewire\Staff;

use App\Models\Training\Training;
use App\Models\Training\TrainingRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TrainingRequestForm extends Component
{
    public $trainings;
    public $training_id;
    public $title;
    public $description;
    public $requests;

    public function mount()
    {
        $this->trainings = Training::all();
        $this->loadRequests();
    }

    public function loadRequests()
    {
        $this->requests = TrainingRequest::where('user_id', Auth::id())->latest()->get();
    }

    public function submit()
    {
        $this->validate([
            'training_id' => 'required|exists:trainings,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        TrainingRequest::create([
            'user_id' => Auth::id(),
            'training_id' => $this->training_id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => 'pending',
        ]);

        // Reset form fields
        $this->reset(['training_id', 'title', 'description']);

        // Refresh requests
        $this->loadRequests();

        session()->flash('message', 'Training request submitted successfully.');
    }

    public function deleteRequest($requestId)
    {
        $request = TrainingRequest::find($requestId);

        if ($request && $request->user_id === Auth::id()) {
            $request->delete();
            $this->loadRequests(); // Refresh the list
            session()->flash('message', 'Training request deleted successfully.');
        }
    }

    public function index(){
        return view('staff.training.request-form');
    }
    public function render()
    {
        return view('livewire.staff.training-request-form');
    }
}
