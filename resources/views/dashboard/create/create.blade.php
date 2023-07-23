@extends('layout.dashboard')
@section('content')
    <div class="mt-3">
        <form action="{{route('storePost')}}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="grid grid-cols-3 gap-3 my-3">
                <div class="col-span-1">
                    <label for="title" class="font-bolder text-xs">Title</label>
                    <input type="text" required id="title" name="title" placeholder="Post title"
                           class="w-full bg-white p-2 py-3.5 shadow-sm rounded-[2px] focus:outline-none font-normal text-xs">
                    @error('text')
                    <div class="text-xs">
                        <small class="text-red-500 font-normal mt-2">{{$message}}</small>
                    </div>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label for="tag" class="font-bolder text-xs">Tags <small class="font-normal text-gray-700">(use
                            comma)</small> </label>
                    <input type="text" id="tag" name="tags" placeholder="Tags"
                           class="w-full bg-white p-2 py-3.5 shadow-sm rounded-[2px] focus:outline-none font-normal text-xs">
                    @error('tags')
                    <div class="text-xs">
                        <small class="text-red-500 font-normal mt-2">{{$message}}</small>
                    </div>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label for="file" class="font-bolder text-xs">Image</label>
                    <input type="file" name="file" id="file"
                           class="w-full bg-white p-2 py-[11px] shadow-sm rounded-[2px] focus:outline-none font-normal text-xs">
                </div>
                @error('file')
                <div class="text-xs">
                    <small class="text-red-500 font-normal mt-2">{{$message}}</small>
                </div>
                @enderror
            </div>
            @include('dashboard.create.text-editor')
            @error('editor')
            <div class="text-xs">
                <small class="text-red-500 font-normal mt-2">{{$message}}</small>
            </div>
            @enderror
            <div class="flex items-center justify-between">
                <div></div>
                <div class="gap-3">
                    <button class="text-[#3d50ff] p-2 font-medium text-xs">
                        Save as draft
                    </button>
                    <button class="bg-[#3d50ff] text-white p-2 font-medium text-xs">
                        Publish
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
