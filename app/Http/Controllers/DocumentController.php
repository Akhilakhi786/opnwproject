<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
   public function index()
{
    $employee = \App\Models\Employee::where('user_id', auth()->id())->first();

    $documents = \App\Models\Document::where('employee_id', $employee->id)->latest()->get();

    return view('employee.emp-documents', compact('documents'));
}

// 🔥 NEW METHOD
public function myDocuments()
{
    $employee = \App\Models\Employee::where('user_id', auth()->id())->first();

    $documents = \App\Models\Document::where('employee_id', $employee->id)->latest()->get();

    return view('employee.emp-my-documents', compact('documents'));
}

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'file' => 'required|file'
        ]);

        $employee = Employee::where('user_id', Auth::id())->first();

        $filePath = $request->file('file')->store('documents', 'public');

        Document::create([
            'employee_id' => $employee->id,
            'title' => $request->title,
            'type' => $request->type,
            'file' => $filePath,
            'status' => 'pending'
        ]);

        return redirect('/employee/documents');
    }
    public function destroy($id)
{
    $doc = \App\Models\Document::findOrFail($id);

    // delete file from storage
    if ($doc->file && file_exists(storage_path('app/public/' . $doc->file))) {
        unlink(storage_path('app/public/' . $doc->file));
    }

    $doc->delete();

    return back()->with('success', 'Document deleted!');
}
public function adminIndex()
{
    $documents = \App\Models\Document::with('employee')->latest()->get();

    return view('admin.documents', compact('documents'));
}

public function approve($id)
{
    $doc = \App\Models\Document::findOrFail($id);
    $doc->update(['status' => 'approved']);

    return back()->with('success', 'Document approved!');
}

public function reject($id)
{
    $doc = \App\Models\Document::findOrFail($id);
    $doc->update(['status' => 'rejected']);

    return back()->with('success', 'Document rejected!');
}
}