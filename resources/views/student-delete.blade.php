@extends('layouts.mainlayout')
@section('title', 'home')
    
@section('content')
<div class="mt-5">

    <h2>are you sure delete data : {{ $student->name }} ({{ $student->nis }})</h2>
<form action="/student-destroy/{{ $student->id }}" style="display: inline-block" method="POST">
    @csrf
    @method('delete')
    
    <button type="submit" class="btn btn-danger">delete</button>
</form>
    <a href="/students" class="btn btn-primary">cancel</a>
</div>
@endsection