<?php

namespace App\Http\Controllers\VoiceEvaluation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    public function create()
    {
        return view('voice-evaluations.categories.create');
    }
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        Session::flash('success', 'Category added successfully!');
        return redirect()->route('voice-evaluations.index');
    }
    public function edit(Category $category)
    {
        return view('voice-evaluations.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        Session::flash('success', 'Category updated successfully!');
        return redirect()->route('voice-evaluations.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        Session::flash('success', 'Category deleted successfully!');
        return back();
    }

}
