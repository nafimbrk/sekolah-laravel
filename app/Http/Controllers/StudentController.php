<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCreateRequest;
use App\Models\ClassRoom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        // dd('test');

        // $nama = 'budi';
        // return view('student', ['nama' => $nama]);

        // $student = Student::all();
        // $student = Student::get();
        // dd($student);


        $keyword = $request->keyword;

        // $student = Student::simplePaginate(15);
        $student = Student::with('class')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('gender', $keyword)
            ->orWhere('nis', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('class', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->paginate(15);

        // $student = Student::withTrashed()->get();

        return view('student', ['studentList' => $student]);


        // query builder
        // $student = DB::table('students')->get();
        // dd($student);
        // DB::table('students')->insert([
        //     'name' => 'query builder',
        //     'gender' => 'L',
        //     'nis' => '7877887',
        //     'class_id' => 1
        // ]);
        // DB::table('students')->where('id', 27)->update([
        //     'name' => 'query builder 2',
        //     'class_id' => 3
        // ]);
        // DB::table('students')->where('id', 27)->delete();







        // eloquent
        // $student = Student::all();
        // dd($student);
        // Student::create([
        //     'name' => 'eloquent',
        //     'gender' => 'P',
        //     'nis' => '8758757',
        //     'class_id' => 2
        // ]);
        // Student::find(28)->update([
        //     'name' => 'eloquent 2',
        //     'class_id' => 1
        // ]);
        // Student::find(28)->delete();











        $nilai = [3, 4, 6, 7, 4, 6, 8, 5, 6];

        // php biasa
        // 1. hitung jumlah nilai
        // 2. hitung berapa banyak nilai
        // 3. hitung nilai rata"

        // $countNilai = count($nilai);
        // $totalNilai = array_sum($nilai);
        // $nilaiRataRata = $totalNilai / $countNilai;

        // collection
        // 1. hitung rata" nilai

        // $nilaiRataRata = collect($nilai)->avg();

        // dd($nilaiRataRata);




        // contains = cek apakah sebuah array memiliki sesuatu
        // $a = collect($nilai)->contains(10);
        // $a = collect($nilai)->contains(function($value) {
        //     return $value < 6;
        // });

        // dd($a);


        // $restaurantA = ['burger', 'siomay', 'pizza', 'spageti', 'makaroni', 'martabak', 'bakso'];
        // $restaurantB = ['pizza', 'fried chicken', 'martabak', 'sayur asem', 'pecel lele', 'bakso'];

        // $menuRestoA = collect($restaurantA)->diff($restaurantB);
        // $menuRestoB = collect($restaurantB)->diff($restaurantA);

        // dd($menuRestoA);
        // dd($menuRestoB);


        // $b = collect($nilai)->filter(function ($value) {
        //     return $value > 7;
        // })->all();

        // dd($b);

        // $biodata = [
        //     ['nama' => 'budi', 'umur' => 26],
        //     ['nama' => 'eko', 'umur' => 75],
        //     ['nama' => 'heru', 'umur' => 80],
        //     ['nama' => 'herman', 'umur' => 90]
        // ];

        // $a = collect($biodata)->pluck('nama');
        // dd($a);



        // kita akan mencari tahu hasil dari nilai dikali 2 dari data" yang ada di array $nilai

        // $nilaiKaliDua = [];
        // foreach ($$nilai as $value) {
        //     array_push($nilaiKaliDua, $value * 2);
        // }

        // dd($nilaiKaliDua);

        // $a = collect($nilai)->map(function ($value) {
        //     return $value * 2;
        // })->all();

        // dd($a);

    }

    public function show($id)
    {
        // dd($id);

        // $student = Student::find($id);
        $student = Student::with(['class.homeroomTeacher', 'extracurriculars'])->findOrFail($id);
        return view('student-detail', ['student' => $student]);
    }

    public function create()
    {
        // $class = ClassRoom::all();
        $class = ClassRoom::select('id', 'name')->get();
        return view('student-add', ['class' => $class]);
    }

    public function store(StudentCreateRequest $request)
    {
        // dd($request->all());

        // $student = new Student;
        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nis = $request->nis;
        // $student->class_id = $request->class_id;
        // $student->save();

        // $validated = $request->validate([
        //     'nis' => 'unique:students|max:8',
        //     'name' => 'max:50|required',
        //     'gender' => 'required',
        //     'class_id' => 'required'
        // ]);

        $newName = '';

        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            // $request->file('photo')->store('photo');
            $request->file('photo')->storeAs('photo', $newName);
        }


        $request['image'] = $newName;
        $student = Student::create($request->all());

        if ($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'add new student success');
        }
        return redirect('/students');
    }

    public function edit(Request $request, $id)
    {

        $student = Student::with('class')->findOrFail($id);
        // dd($student);
        $class = ClassRoom::where('id', '!=', $student->class_id)->get(['id', 'name']);
        return view('student-edit', ['student' => $student, 'class' => $class]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nis = $request->nis;
        // $student->class_id = $request->class_id;
        // $student->save();

        $student->update($request->all());
        return redirect('students');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('student-delete', ['student' => $student]);
    }

    public function destroy($id)
    {
        // $deletedStudent = DB::table('students')->where('id', $id);
        $deletedStudent = Student::findOrFail($id);
        $deletedStudent->delete();

        if ($deletedStudent) {
            Session::flash('status', 'success');
            Session::flash('message', 'delete student success');
        }

        return redirect('/students');
    }

    public function deletedStudent()
    {
        $deletedStudent = Student::onlyTrashed()->get();
        return view('student-deleted-list', ['student' => $deletedStudent]);
    }

    public function restore($id)
    {
        $deletedStudent = Student::withTrashed()->where('id', $id)->restore();

        if ($deletedStudent) {
            Session::flash('status', 'success');
            Session::flash('message', 'restore student success');
        }
        return redirect('/students');
    }
}












// $student = Student::with(['class.homeroomTeacher', 'extracurriculars'])->get();
