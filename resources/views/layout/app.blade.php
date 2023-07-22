@extends('layout.base')
@section('template')
    <div class="w-2/3 mx-auto my-3">
        <x-navbar/>
        @yield('content')
    </div>
@endsection
