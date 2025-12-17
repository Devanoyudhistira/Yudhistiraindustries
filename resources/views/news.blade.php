<x-layout>
    <x-slot:title>news</x-slot:title>
    <x-navbar>news</x-navbar>
    <main class="relative mt-10 flex h-max w-screen flex-col gap-1">
        <div class="flex h-max w-full items-center justify-between">
            <div class="flex w-full flex-col ">
                <div class="flex w-full justify-between items-center">
                    <h1 class="font-zalando text-6xl tracking-wider font-bold">{{ $news['title'] }}</h1>
                    <a href="/news" class="mr-5">
                        <h2 class="bi bi-left-arrow font-orbit text-5xl text-red-700">X</h2>
                    </a>
                </div>
            <div class="flex w-full  justify-between items-center" >
                <h1 class="font-zolando ml-1 border-l-2 border-red-700 pl-1 text-2xl font-semibold">
                    {{ $news->author->name }}</h1>
                <h2 class="font-bebas -mr-6 h-min w-40 text-2xl">{{ $news['created_at']->diffForhumans() }}</h2>
            </div>
        </div>
        </div>

        <img src="{{ asset("storage/" . $news["thumbnail"]) }}" class="h-120 w-screen object-cover object-center" alt="">
        <article class="mt-3 h-max px-3">
            <p class="font-zolando text-left text-xl font-medium text-zinc-900">{{ $news['blog'] }}</p>
        </article>

    </main>

</x-layout>
