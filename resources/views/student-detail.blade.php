@extends('layouts.mainlayout')
@section('title', 'students')

@section('content')
    {{-- {{ $student }} --}}

    <h2>anda sedang melihat data detail dari siswa yang bernama {{ $student->name }}</h2>

    <div class="my-3 d-flex justify-content-center">
        @if ($student->image != '')
        <img src="{{ asset('storage/photo/' . $student->image)}}" alt="" width="200px">
        @else
        <img src="{{ asset('images/1S.PNG')}}" alt="" width="200px">
        @endif
    </div>
    <div class="mt-5 mb-5">
        <table class="table table-bordered">
            <tr>
                <th>nis</th>
                <th>gender</th>
                <th>class</th>
                <th>homeroom teacher</th>
            </tr>
            <tr>
                <td>{{ $student->nis }}</td>
                <td>
                    @if ($student->gender == 'P')
                        Perempuan
                    @else
                        Laki-Laki
                    @endif
                </td>
                <td>{{ $student->class->name }}</td>
                <td>{{ $student->class->homeroomTeacher->name }}</td>
            </tr>
        </table>
    </div>

    <div>
        <h3>extracurricular</h3>
        <ol>
            @foreach ($student->extracurriculars as $item)
            <li>{{ $item->name }}</li>
            @endforeach
        </ol>
    </div>

    <style>
        th {
            width: 25%;
        }
    </style>
@endsection
