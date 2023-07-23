@extends('layout.base')
@section('template')
    <div class="w-2/3 mx-auto my-3">
        <x-navbar/>
        <div class="grid-cols-10 grid gap-2">
            <div class="col-span-2 my-3 p-3 pl-0 text-gray-800 font-medium text-xs">
                <ul>
                    <li>
                        <a href="#" @class([
                                            'font-bolder' => in_array(request()->route()->getName(), ['createPost', 'postList'])
                                    ])>
                            Post List
                        </a>
                    </li>
                    <hr class="border-t border-gray-300 my-3">
                    <li>
                        <a href="#">
                            Log Out
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-span-8">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
