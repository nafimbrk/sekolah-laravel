@extends('layouts.mainlayout')
@section('title', 'home')
    
@section('content')


<h1>ini adalah halaman student yang sudah di delete</h1>


<div class="my-5">
    <a href="/students" class="btn btn-primary">back</a>
</div>

<div class="mt-5">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>gender</th>
                <th>nis</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->gender }}</td>
                <td>{{ $data->nis }}</td>
                <td>
                    <a href="/student/{{ $data->id }}/restore">restore</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection