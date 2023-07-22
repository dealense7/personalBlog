<div class="flex items-center justify-between bg-white p-3 rounded-[4px] shadow-md">
    <a href="/" class="flex items-center">
        <div class="h-10 w-10 relative bg-[#3d5aff] rounded-[11px] p-2.5">
            <img src="{{Vite::asset('resources/img/logo.png')}}"/>
        </div>
        <div class="ml-2 font-bold grid text-xl text-gray-900">
            <h1>Space <span class="font-medium">Monkey</span></h1>
            <span class="font-normal text-xs text-gray-700">Coding Chronicles</span>
        </div>
    </a>

    <ul class="flex items-center gap-4 text-gray-700 text-sm font-normal">
        <li>
            <a
                href="{{route('blog')}}"
                @class([
                    'hover:text-gray-900 hover:font-bolder',
                    'text-gray-900 font-bolder' => request()->route()->getName() === 'blog'
                ])
            >
                Blog
            </a>
        </li>
        <li>
            <a
                href="{{route('aboutMe')}}"
                @class([
                    'hover:text-gray-900 hover:font-bolder',
                    'text-gray-900 font-bolder' => request()->route()->getName() === 'aboutMe'
                ])
            >
                About Me
            </a>
        </li>
    </ul>
</div>
