@extends('layouts.mainlayout')
@section('title', 'home')
    
@section('content')
<div class="mt-5 col-8 m-auto">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="student" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name">nama</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="mb-3">
            <label for="gender">gender</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="">select one</option>
                <option value="L">L</option>
                <option value="P">P</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nis">nis</label>
            <input type="text" name="nis" class="form-control" id="nis" required>
        </div>
        <div class="mb-3">
            <label for="class">class</label>
            <select name="class_id" id="class" class="form-control" required>
                <option value="">select one</option>
                @foreach ($class as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="photo">photo</label>
            <div class="input-group">
                <input class="form-control" type="file" id="photo" name="photo">
            </div>
          </div>

        <div class="mb-3">
            <button class="btn btn-success" type="submit">save</button>
        </div>
    </form>
</div>
@endsection