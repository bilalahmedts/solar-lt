<?php

namespace App\Http\Controllers\VoiceEvaluation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Datapoint;
class VoiceEvaluationController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        
        return view('voice-evaluations.index', (compact('categories')));
    }
   
    
}
