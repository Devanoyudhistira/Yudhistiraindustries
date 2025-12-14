<x-layout>
    <x-slot:title>news</x-slot:title>
    <x-navbar>news</x-navbar>
    <main class="relative mt-10 flex w-screen h-max flex-col gap-1">
        <div class="flex h-max w-full items-center justify-between px-3">
            <div class="flex w-full justify-between">
                <div class="flex flex-col gap-3">
                    <h1 class="font-zalando text-5xl font-bold">{{ $news['title'] }}</h1>
                    <h1 class="font-zolando border-l-2 ml-3 pl-2 border-red-700 text-2xl font-semibold">{{ $news->author->name }}</h1>
                </div>
                <a href="/news" class="-mr-30 ">
                    <h2 class="bi bi-left-arrow font-orbit text-5xl text-red-700">X</h2>
                </a>
            </div>
            <h2 class="font-bebas w-40 mt-8 h-min text-2xl">{{ $news['created_at']->diffForhumans() }}</h2>
        </div>

        <img src="{{ asset('image/image2.jpg') }}" class="h-120 w-screen object-cover object-center" alt="">
        <article class="mt-3 px-3 h-max">
            <p class="font-zolando text-left text-xl font-medium text-zinc-900">{{ $news['blog'] }}</p>
        </article>

    </main>

</x-layout>
