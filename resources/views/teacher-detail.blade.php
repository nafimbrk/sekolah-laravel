@extends('layouts.mainlayout')
@section('title', 'students')

@section('content')

    <h2>anda sedang melihat data detail dari techer yang bernama {{ $teacher->name }}</h2>

    <div class="mt-5">
        <h3>
            class :
            @if ($teacher->class)
                {{ $teacher->class->name }}
            @else
                -
            @endif
        </h3>
    </div>

    <div class="mt-5">
        <h4>list student</h4>
        @if ($teacher->class)
        <ol>
            @foreach ($teacher->class->students as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ol>    
        @endif
    </div>
@endsection
