<?php

namespace App\Http\Controllers\Training;

use App\Http\Controllers\Controller;
use App\Models\Training\CourseProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseProgressController extends Controller
{
    //
    public function updateProgress(Request $request)
    {
        $request->validate([
            'material_id' => 'required|exists:course_materials,id',
            'training_id' => 'required|exists:trainings,id',
        ]);

        CourseProgress::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
                'training_id' => $request->training_id,
                'course_material_id' => $request->material_id,
            ],
            ['status' => 'completed']
        );

        return response()->json(['message' => 'Progress updated successfully']);
    }
}
