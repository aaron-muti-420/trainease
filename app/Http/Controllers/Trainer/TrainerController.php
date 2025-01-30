<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    //
    public function index(){
        return view('trainer.dashboard.index');
    }
}
