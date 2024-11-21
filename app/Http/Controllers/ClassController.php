<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\ClassLike;

class ClassController extends Controller
{
    public function index() {

        // lazy load
        // $class = ClassRoom::get();

        // eager load
        $class = ClassRoom::get();
        return view('classroom', ['classList' => $class]);
    }



    public function show($id)
    {
        $class = ClassRoom::with(['students', 'homeroomTeacher'])->findOrFail($id);
        return view('class-detail', ['class' => $class]);
    }
}












// $class = ClassRoom::with('students', 'homeroomTeacher')->get();
