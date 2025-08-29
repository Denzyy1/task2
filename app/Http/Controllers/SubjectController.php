<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
   public function index()
{
    $subjects = Subject::all();
    return view('Task3.subjects', compact('subjects'));
}

public function destroy($id)
{
    $subject = Subject::findOrFail($id);
    $subject->delete();

    return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully');
}
}
