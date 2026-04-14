<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;

class HolidayController extends Controller
{
    public function create()
    {
        return view('admin.add-holiday');
    }

   public function store(Request $request)
{
    // ✅ Validate input
    $request->validate([
        'title' => 'required',
        'date' => 'required|date',
    ]);

    $day = date('l', strtotime($request->date));

    Holiday::create([
        'title' => $request->title,
        'date' => $request->date,
        'day' => $day,
    ]);

    return redirect('/admin/holidays')->with('success', 'Holiday Added');
}
}