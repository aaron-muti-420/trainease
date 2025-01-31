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
}
