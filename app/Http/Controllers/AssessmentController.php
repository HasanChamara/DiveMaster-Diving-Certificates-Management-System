<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller {
    public function index() {
        $assessments = Assessment::all();
        return view('assessments.index', compact('assessments'));
    }

    public function create() {
        return view('assessments.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Assessment::create($request->all());

        return redirect()->route('assessments.index')->with('success', 'Assessment added successfully.');
    }

    public function show(Assessment $assessment) {
        return view('assessments.show', compact('assessment'));
    }

    public function edit(Assessment $assessment) {
        return view('assessments.edit', compact('assessment'));
    }

    public function update(Request $request, Assessment $assessment) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $assessment->update($request->all());

        return redirect()->route('assessments.index')->with('success', 'Assessment updated successfully.');
    }

    public function destroy(Assessment $assessment) {
        $assessment->delete();
        return redirect()->route('assessments.index')->with('success', 'Assessment deleted successfully.');
    }
}
