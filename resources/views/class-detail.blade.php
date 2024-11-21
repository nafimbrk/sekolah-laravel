@extends('layouts.mainlayout')
@section('title', 'students')

@section('content')


    <h2>anda sedang melihat data detail dari class {{ $class->name }}</h2>
    
<div class="mt-5">
    <h4>homeroom teacher : {{ $class->homeroomTeacher->name }}</h4>
</div>

<div class="mt-5">
    <h4>list student</h4>
    <ol>
        @foreach ($class->students as $item)
          <li>{{ $item->name }}</li>
        @endforeach
    </ol>
</div>
    
@endsection
