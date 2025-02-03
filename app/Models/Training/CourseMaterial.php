<?php

namespace App\Models\Training;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMaterial extends Model
{
    /** @use HasFactory<\Database\Factories\Training\CourseMaterialFactory> */
    use HasFactory;

    protected $guarded = [];

    public function training(){
        return $this->belongsTo(Training::class);
    }
}
