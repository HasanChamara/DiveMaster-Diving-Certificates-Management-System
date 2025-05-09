<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Inventories;
use App\Models\Inventory;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('inventories/index', [
            "inventories" => Inventory::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('inventories/create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(["title" => "required", "sku" => "required" , "brand" => "required" , "status" => "required" , "description" => "required"]);
        Inventory::create([
         "title"=> $request->title,
         "sku"=> $request->sku,
         "brand"=> $request->brand,
         "status"=> $request->status,
         "description"=> $request->description
        ]);
        return redirect()->route('inventories.index');
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
        $inventory = Inventory::find($id);
        return Inertia::render('inventories/edit', [
            "inventory" => $inventory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(["title" => "required", "sku" => "required" , "brand" => "required" , "status" => "required" , "description" => "required"]);
       
        $inventory = Inventory::find($id);
        $inventory->title = $request->title;
        $inventory->sku = $request->sku;
        $inventory->brand = $request->brand;
        $inventory->status = $request->status;
        $inventory->description = $request->description;
        $inventory->save();

       return redirect()->route('inventories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Inventory::destroy($id);
        return redirect()->route('inventories.index');
    }
}
