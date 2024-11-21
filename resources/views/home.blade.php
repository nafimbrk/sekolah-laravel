@extends('layouts.mainlayout')
@section('title', 'home')
    
@section('content')
    
<h1>ini halaman home</h1>
{{-- <h2>selamat datang {{ $name }}, anda adalah {{ $role }}</h2> --}}

<h2>selamat datang, {{ Auth::user()->name }}. anda adalah {{ Auth::user()->role->name }}</h2>

{{-- @if ($role == 'admin')
<a href="">ke halaman admin</a>
@elseif ($role == 'staff')
<a href="">ke halaman gudang</a>
@else
<a href="">ke halaman ngawor</a>
@endif --}}

{{-- @switch($role)
    @case($role == 'admin')
    <a href="">ke halaman admin</a>
    @break
    
    @case($role == 'staff')
    <a href="">ke halaman gudang</a>
    @break
    
    @default
    <a href="">ke halaman ngawor</a>
    @endswitch --}}
    
    {{-- @for ($i = 0; $i < 5; $i++)
        {{ $i }} <br>
        @endfor --}}
        
        {{-- <table class="table">
            <tr>
                <th>no</th>
                <th>name</th>
            </tr>
            @foreach ($buah as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data }}</td>
            </tr>
            @endforeach
        </table> --}}
        
        
        @endsection