<?php

namespace App\Http\Controllers;

use App\Models\Cleaner;
use Illuminate\Http\Request;

class CleanerController extends Controller
{
    public function index()
    {
        return Cleaner::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'services' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:cleaners',
        ]);

        return Cleaner::create($request->all());
    }

    public function show($id)
    {
        return Cleaner::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $cleaner = Cleaner::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'services' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:cleaners,email,' . $cleaner->id,
        ]);

        $cleaner->update($request->all());

        return $cleaner;
    }

    public function destroy($id)
    {
        $cleaner = Cleaner::findOrFail($id);
        $cleaner->delete();

        return response()->json(['message' => 'Cleaner deleted successfully']);
    }
}
