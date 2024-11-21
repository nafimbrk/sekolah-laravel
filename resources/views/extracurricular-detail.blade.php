@extends('layouts.mainlayout')
@section('title', 'students')

@section('content')

    <h2>anda sedang melihat data detail dari siswa yang bernama {{ $student->name }}</h2>


    <div class="mt-5">
        <h3>list peserta</h3>
        <ol>
            @foreach ($ekskul->students as $item)
            <li>{{ $item->name }}</li>
            @endforeach
        </ol>
    </div>
