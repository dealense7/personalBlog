@extends('layout.app')
@section('content')
    <div class="mt-3">
        <div class="w-full">
            <div class="flex items-center justify-between bg-gray-300 font-medium text-sm text-gray-800">
                <div class="flex items-center gap-3 py-2 px-3 [&>*]:w-5 [&>*]:h-8 [&>*]:flex [&>*]:items-center [&>*]:justify-center">
                    <button
                        onclick="addMarkdownTag('**', '**')"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-type-bold" viewBox="0 0 16 16">
                            <path d="M8.21 13c2.106 0 3.412-1.087 3.412-2.823 0-1.306-.984-2.283-2.324-2.386v-.055a2.176 2.176 0 0 0 1.852-2.14c0-1.51-1.162-2.46-3.014-2.46H3.843V13H8.21zM5.908 4.674h1.696c.963 0 1.517.451 1.517 1.244 0 .834-.629 1.32-1.73 1.32H5.908V4.673zm0 6.788V8.598h1.73c1.217 0 1.88.492 1.88 1.415 0 .943-.643 1.449-1.832 1.449H5.907z"/>
                        </svg>
                    </button>
                    <button onclick="addMarkdownTag('_', '_')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-type-italic" viewBox="0 0 16 16">
                            <path d="M7.991 11.674 9.53 4.455c.123-.595.246-.71 1.347-.807l.11-.52H7.211l-.11.52c1.06.096 1.128.212 1.005.807L6.57 11.674c-.123.595-.246.71-1.346.806l-.11.52h3.774l.11-.52c-1.06-.095-1.129-.211-1.006-.806z"/>
                        </svg>
                    </button>
                    <button onclick="addMarkdownTag('<ins>', '</ins>')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-type-underline" viewBox="0 0 16 16">
                            <path d="M5.313 3.136h-1.23V9.54c0 2.105 1.47 3.623 3.917 3.623s3.917-1.518 3.917-3.623V3.136h-1.23v6.323c0 1.49-.978 2.57-2.687 2.57-1.709 0-2.687-1.08-2.687-2.57V3.136zM12.5 15h-9v-1h9v1z"/>
                        </svg>
                    </button>
                    <span class="text-gray-400">|</span>
                    <button onclick="addHeader(1)">H <sub>1</sub></button>
                    <button onclick="addHeader(2)">H <sub>2</sub></button>
                    <span class="text-gray-400">|</span>
                    <button onclick="addMarkdownTag('* ', '')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        </svg>
                    </button>
                    <button onclick="addMarkdownTag('> ', '')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-blockquote-left" viewBox="0 0 16 16">
                            <path d="M2.5 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1h-11zm5 3a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6zm0 3a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6zm-5 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1h-11zm.79-5.373c.112-.078.26-.17.444-.275L3.524 6c-.122.074-.272.17-.452.287-.18.117-.35.26-.51.428a2.425 2.425 0 0 0-.398.562c-.11.207-.164.438-.164.692 0 .36.072.65.217.873.144.219.385.328.72.328.215 0 .383-.07.504-.211a.697.697 0 0 0 .188-.463c0-.23-.07-.404-.211-.521-.137-.121-.326-.182-.568-.182h-.282c.024-.203.065-.37.123-.498a1.38 1.38 0 0 1 .252-.37 1.94 1.94 0 0 1 .346-.298zm2.167 0c.113-.078.262-.17.445-.275L5.692 6c-.122.074-.272.17-.452.287-.18.117-.35.26-.51.428a2.425 2.425 0 0 0-.398.562c-.11.207-.164.438-.164.692 0 .36.072.65.217.873.144.219.385.328.72.328.215 0 .383-.07.504-.211a.697.697 0 0 0 .188-.463c0-.23-.07-.404-.211-.521-.137-.121-.326-.182-.568-.182h-.282a1.75 1.75 0 0 1 .118-.492c.058-.13.144-.254.257-.375a1.94 1.94 0 0 1 .346-.3z"/>
                        </svg>
                    </button>
                </div>
                <button class="mr-3 bg-[#3d50ff] text-white p-1.5 font-medium text-xs">
                    Preview
                </button>
            </div>
            <textarea id="editor" class="w-full font-normal text-sm focus:outline-none p-3" rows="15" placeholder="Type your Markdown text here..."></textarea>
        </div>
    </div>
@endsection

@push('scripts')
    <script>

        function addMarkdownTag(tagStart, tagEnd) {
            const editor = document.getElementById('editor');
            const startPos = editor.selectionStart;
            const endPos = editor.selectionEnd;
            const selectedText = editor.value.substring(startPos, endPos);
            const replacement = tagStart + selectedText + tagEnd;
            editor.value =
                editor.value.substring(0, startPos) +
                replacement +
                editor.value.substring(endPos, editor.value.length);
            // Update preview
            updatePreview();
        }

        function addHeader(level) {
            const editor = document.getElementById('editor');
            const startPos = editor.selectionStart;
            const endPos = editor.selectionEnd;
            const selectedText = editor.value.substring(startPos, endPos);
            const header = '#'.repeat(level) + ' ' + selectedText;
            editor.value =
                editor.value.substring(0, startPos) +
                header +
                editor.value.substring(endPos, editor.value.length);
            // Update preview
            updatePreview();
        }
    </script>
@endpush
