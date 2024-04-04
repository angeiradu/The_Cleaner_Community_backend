<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookedCleaner;

class BookedCleanerController extends Controller
{
    public function index()
    {
        $bookedCleaners = BookedCleaner::all();
        return response()->json(['booked_cleaners' => $bookedCleaners]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'services' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'day' => 'required|date',
            'additional_services' => 'nullable|string|max:255',
        ]);

        $bookedCleaner = BookedCleaner::create($request->all());
        return response()->json(['message' => 'Booked cleaner created successfully', 'booked_cleaner' => $bookedCleaner]);
    }

    public function show($id)
    {
        $bookedCleaner = BookedCleaner::findOrFail($id);
        return response()->json(['booked_cleaner' => $bookedCleaner]);
    }

    public function update(Request $request, $id)
    {
        $bookedCleaner = BookedCleaner::findOrFail($id);
        $bookedCleaner->update($request->all());
        return response()->json(['message' => 'Booked cleaner updated successfully', 'booked_cleaner' => $bookedCleaner]);
    }

    public function destroy($id)
    {
        $bookedCleaner = BookedCleaner::findOrFail($id);
        $bookedCleaner->delete();
        return response()->json(['message' => 'Booked cleaner deleted successfully']);
    }
}
