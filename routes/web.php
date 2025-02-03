<?php

use App\Livewire\Staff\MyTrainings;
use App\Livewire\Staff\TrainingCoursesPage;
use App\Livewire\Staff\TrainingRequestForm;
use App\Livewire\Training\Course;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/trainings', [TrainingCoursesPage::class, 'index'])->name('training.courses');
    Route::get('/training-request-form', [TrainingRequestForm::class, 'index'])->name('training.request');
    Route::get('/mytrainings', [MyTrainings::class, 'index'])->name('my.trainings');
    Route::get('/course/{course_id}', [Course::class,'show'])->name('start.course');
});
