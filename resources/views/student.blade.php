@extends('layouts.mainlayout')
@section('title', 'students')

@section('content')
    <h1>ini halaman student</h1>
    {{-- <h2>{{ $nama }}</h2> --}}

    {{-- <p>{{ $studentList }}</p> --}}



    <div class="my-5 d-flex justify-content-between">
        <a href="student-add" class="btn btn-primary">Add Data</a>
        <a href="student-deleted" class="btn btn-info">show deleted data</a>
    </div>


    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <h3>student list</h3>

    <div class="my-3 col-12 col-sm-8 col-md-5">
        <form action="" method="GET">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="keyword" placeholder="keyword">
            <button class="input-group-text btn btn-primary">search</button>
          </div>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>gender</th>
                <th>nis</th>
                <th>class</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studentList as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->gender }}</td>
                    <td>{{ $data->nis }}</td>
                    <td>{{ $data->class->name }}</td>
                    <td>
                        @if (Auth::user()->role_id != 1 && Auth::user()->role_id != 2)
                        -
                        @else
                        <a href="student/{{ $data->id }}">detail</a>
                        <a href="student-edit/{{ $data->id }}">edit</a>
                        @endif

                        @if (Auth::user()->role_id == 1)
                        <a href="student-delete/{{ $data->id }}">delete</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-5">
        {{ $studentList->withQueryString()->links() }}
    </div>
@endsection











{{-- <td>{{ $data->class }}</td> --}}
{{-- <td>{{ $data->class['name'] }}</td>
<td>
    @foreach ($data->extracurriculars as $item)
       - {{ $item->name }} <br>
    @endforeach
</td>
<td>{{ $data->class->homeroomTeacher->name }}</td> --}}
