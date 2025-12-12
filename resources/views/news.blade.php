<x-layout>
    <x-slot:title>news</x-slot:title>
    <x-navbar>news</x-navbar>
    <main class="relative mt-10 flex h-20 w-screen flex-col gap-1">
        <div class="flex h-max w-full items-center justify-between px-3">
            <div class="flex justify-evenly">
                <a href="/news">
                    <h2 class="bi bi-left-arrow font-orbit left-5 top-[15%] text-5xl text-red-700">X</h2>
                </a>
                <div class="flex flex-col gap-3">
                    <h1 class="font-zalando text-5xl font-bold">{{ $news['title'] }}</h1>
                    <h1 class="font-zolando border-l-2 -ml-10 pl-2 border-red-700 text-2xl font-semibold">sender</h1>
                </div>
            </div>
            <h2 class="font-bebas mr-4 text-2xl">{{ $news['created_at']->diffForhumans() }}</h2>
        </div>

        <img src="{{ asset('image/image2.jpg') }}" class="h-120 w-screen object-cover object-center" alt="">
        <article class="mt-3 w-screen px-3">
            <p class="font-zolando text-left text-xl font-medium text-zinc-900">{{ $news['blog'] }}</p>
        </article>

    </main>

</x-layout>
