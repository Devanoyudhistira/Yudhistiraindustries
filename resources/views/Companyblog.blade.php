<x-layout>
    <x-navbar></x-navbar>       
    <x-slot:title> Blogsite </x-slot:title>
    <div class="flex flex-col">
        <h1 class="text-green self-center text-center text-2xl">
            company blog
        </h1>
        <main class="flex-col-3 page-break flex gap-3 px-2">
            @foreach ($datablogs as $datablog )            
            <article class="flex flex-col self-center border-2 border-black px-1 py-2">
                <h1 class="text-2xl font-bold text-red-600"> {{ $datablog["title"] }} </h1>
                <p class="text-sm text-blue-500"> {{ $datablog["sender"] }} </p>
                <p class="text-xl"> {{ Str::limit($datablog["blog"],15) }} </p>
            </article>
            @endforeach
    
        </main>
        <form action="http://127.0.0.1:8000/companyblog/postblog" class="flex flex-col gap-3 px-2 py-3"
            method="post">
            @csrf
            <label for="title">
                <h2>title</h2>
                <input class="border-3 rounded-2xl border-blue-600" type="text" name="title" id="title">
            </label>
            <label for="blog">
                <h2>blog</h2>
                <input class="border-3 rounded-2xl border-blue-600" type="textarea" name="blog" id="blog">
            </label>
            <label for="sender">
                <h2>sender</h2>
                <input class="border-3 rounded-2xl border-blue-600" type="text" name="sender" id="sender">
            </label>
            <button type="submit" class="h-min text-center w-min bg-blue-400 px-1 py-3 text-red-600">post</button>
        </form>
    </div>
</x-layout>
