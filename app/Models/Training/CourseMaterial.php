<?php

namespace App\Models\Training;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class CourseMaterial extends Model
{
    /** @use HasFactory<\Database\Factories\Training\CourseMaterialFactory> */
    use HasFactory;


    protected $fillable = [
        'training_id',
        'material_name',
        'material_type',
        'material_content',
        'material_url',
        'duration',
        'quiz_data',
    ];

    protected $casts = [
        'quiz_data' => 'array', // Automatically decode JSON quizzes
    ];

    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    public function isVideo()
    {
        return $this->material_type === 'video';
    }

    public function isText()
    {
        return $this->material_type === 'text';
    }

    public function isQuiz()
    {
        return $this->material_type === 'quiz';
    }
    public function isCompletedByUser($userId)
    {
        return $this->progress()->where('user_id', $userId)->where('status', 'completed')->get()->toArray();
    }

    public function progress()
    {
        return $this->hasMany(CourseProgress::class);
    }
}
