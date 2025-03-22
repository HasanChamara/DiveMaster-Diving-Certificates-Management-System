<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller {
    public function index() {
        $inventories = Inventory::all();
        return view('inventories.index', compact('inventories'));
    }

    public function create() {
        return view('inventories.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        Inventory::create($request->all());

        return redirect()->route('inventories.index')->with('success', 'Inventory item added successfully.');
    }

    public function show(Inventory $inventory) {
        return view('inventories.show', compact('inventory'));
    }

    public function edit(Inventory $inventory) {
        return view('inventories.edit', compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory) {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        $inventory->update($request->all());

        return redirect()->route('inventories.index')->with('success', 'Inventory item updated successfully.');
    }

    public function destroy(Inventory $inventory) {
        $inventory->delete();

        return redirect()->route('inventories.index')->with('success', 'Inventory item deleted successfully.');
    }
}
