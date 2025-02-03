<?php

namespace App\Models\Training;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    /** @use HasFactory<\Database\Factories\Training\TrainingFactory> */
    use HasFactory;

    protected $guarded = [];

    public function trainer(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function enrollment(){
        return $this->belongsToMany(Enrollment::class,'user_id','training_id');
    }

    public function courseMaterials(){
        return $this->hasMany(CourseMaterial::class,'training_id');
    }
}
