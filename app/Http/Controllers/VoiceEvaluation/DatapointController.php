<?php

namespace App\Http\Controllers\VoiceEvaluation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DatapointRequest;
use App\Models\Datapoint;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
class DatapointController extends Controller
{

    public function create(Category $category)
    {     
        return view('voice-evaluations.datapoints.create', compact('category'));
    }
    public function store(DatapointRequest $request, Datapoint $datapoint)
    {
        $datapoint->create($request->all());
        Session::flash('success', 'Datapoint added successfully!');
        return redirect()->route('voice-evaluations.index');
    }
    public function edit(Datapoint $datapoint)
    {
        return view('voice-evaluations.datapoints.edit', compact('datapoint'));
    }
    public function update(DatapointRequest $request, Datapoint $datapoint)
    {
        $datapoint->update($request->all());
        Session::flash('success', 'Datapoint updated successfully!');
        return redirect()->route('voice-evaluations.index');
    }
    public function destroy(Datapoint $datapoint)
    {
        $datapoint->delete();
        Session::flash('success', 'Datapoint deleted successfully!');
        return back();
    }
}
