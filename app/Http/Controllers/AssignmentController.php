<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Assignment;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Pest\Mutate\Mutators\Sets\AssignmentSet;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('assignments/index', [
            "assignments" => Assignment::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('assignments/create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(["title" => "required", "mark" => "required", "level" => "required",  "question" => "required"]);
        Assignment::create([
         "title"=> $request->title,
         "mark"=> $request->mark,
         "level"=> $request->level,
         "question"=> $request->question
        ]);
        return redirect()->route('assignments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $assignment = Assignment::find($id);
        return Inertia::render('assignments/edit', [
            "assignment" => $assignment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(["title" => "required", "mark" => "required", "level" => "required",  "question" => "required"]);
       
        $assignment = Assignment::find($id);
        $assignment->title = $request->title;
        $assignment->mark = $request->mark;
        $assignment->level = $request->level;
        $assignment->question = $request->question;
        $assignment->save();

       return redirect()->route('assignments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Assignment::destroy($id);
       return redirect()->route('assignments.index');
    }
}
