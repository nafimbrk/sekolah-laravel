@extends('layouts.mainlayout')
@section('title', 'students')

@section('content')
    <h1>ini halaman class</h1>

    <div class="my-5">
        <a href="" class="btn btn-primary">Add Data</a>
    </div>
    <h3>class list</h3>
    <table class="table">
        <thead>
            <tr>
                <th>no</th>
                <th>name</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classList as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td><a href="class-detail/{{ $data->id }}">detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection













{{-- <td>{{ $data->students }}</td> --}}
{{-- <td>
    @foreach ($data->students as $student) --}}
        {{-- {{ $student }} --}}
        {{-- - {{ $student->['name'] }} <br> --}}
        {{-- - {{ $student->name }} <br>
    @endforeach
</td>
<td>{{ $data->homeroomTeacher->name }}</td> --}}