<?php

namespace App\Http\Controllers;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
   public function index()
{
    $classes = ClassModel::all();
    return view('Task3.classes', compact('classes'));
}

public function destroy($id)
{
    $class = ClassModel::findOrFail($id);
    $class->delete();

    return redirect()->route('classes.index')->with('success', 'Class deleted successfully');
}
}
