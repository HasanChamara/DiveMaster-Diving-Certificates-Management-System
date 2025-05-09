<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('certificates/index', [
        "certificates" => Certificate::latest()->get()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('certificates/create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate(["title" => "required", "body" => "required"]);
       Certificate::create([
        "title"=> $request->title,
        "body" => $request->body
       ]);
       return redirect()->route('certificates.index');
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
        $certificate = Certificate::find($id);
        return Inertia::render('certificates/edit', [
            "certificate" => $certificate
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(["title" => "required", "body" => "required"]);
       
        $certificate = Certificate::find($id);
        $certificate->title = $request->title;
        $certificate->body = $request->body;
        $certificate->save();

       return redirect()->route('certificates.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       Certificate::destroy($id);
       return redirect()->route('certificates.index');
    }
}
