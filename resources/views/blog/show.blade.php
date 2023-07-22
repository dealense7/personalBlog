@extends('layout.app')
@section('content')
    <div class="mt-3">
        <div
            class="mx-auto mt-20 min-w-0 max-w-[40rem] lg:ml-16 lg:mr-0 lg:mt-0 lg:max-w-[50rem] lg:flex-auto prose-sm prose prose-slate prose-a:font-semibold prose-a:text-sky-500 hover:prose-a:text-sky-600">
            <h2 id="getting-set-up">
                Getting set up
            </h2>
            <h3 id="requirements">
                Requirements
            </h3>
            <p>All of the components in Tailwind UI are designed for the latest version of Tailwind CSS, which is
                currently Tailwind CSS v3.3. To make sure that you are on the latest version of Tailwind, update via
                npm:</p>
            <pre class="language-bash" tabindex="0"><code class="language-bash"><span class="token function">npm</span> <span
                        class="token function">install</span> tailwindcss@latest
</code></pre>
            <p>All of the examples in Tailwind UI rely on the default Tailwind CSS configuration, but some rely on
                additional first-party plugins like <code>@tailwindcss/forms</code>,
                <code>@tailwindcss/typography</code>, and <code>@tailwindcss/aspect-ratio</code>.</p>
            <p>When an example requires any plugins or configuration changes, it will be noted in a comment at the top
                of the example.</p>
            <p>If you're new to Tailwind CSS, you'll want to <a href="https://tailwindcss.com/docs">read the Tailwind
                    CSS documentation</a> as well to get the most out of Tailwind UI.</p>
            <h3 id="optional-add-the-inter-font-family">
                Optional: Add the Inter font family
            </h3>
            <p>We've used <a href="https://rsms.me/inter">Inter</a> font family for all of the Tailwind UI examples
                because it's a beautiful font for UI design and is completely open-source and free. Using a custom font
                is nice because it allows us to make the components look the same on all browsers and operating systems.
            </p>
            <p>You can use any font you want in your own project of course, but if you'd like to use Inter, the easiest
                way is to first add it via the CDN:</p>
            @verbatim

            @endverbatim
        </div>
@endsection
