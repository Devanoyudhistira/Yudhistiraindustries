<x-layout>
    <x-navbar>News</x-navbar>
    <x-slot:title> news </x-slot:title>
    <main class="mt-8 flex flex-col">
        <form action="/news/" method="GET" class="mt-13 self-center relative flex gap-4" >
            <input class="border-3 h-13 py-2 pl-3 mr-3 w-90 rounded-2xl border-zinc-950" name="q" type="search" placeholder="search">
            <button type="submit" class=" flex justify-center rounded-xl items-center w-15 h-13 bg-blue-500 absolute -z-10 top-0 -right-15" >
            <i class="bi bi-search text-3xl" ></i>
            </button>
        </form>
        <div class="mt-8 grid w-screen grid-cols-3 gap-x-4 px-3 py-2">
            @foreach ($datablogs as $blog)
                <article
                    class="w-90 h-69 mt-3 pb-4 flex flex-col overflow-hidden rounded-xl rounded-t-2xl border-x-2 border-b-2 border-t-8 border-black border-x-zinc-100 border-t-blue-500 shadow-[8px_8px_0px_black]">
                    <img src="{{ asset('image/image2.jpg') }}" class="h-[50%] w-full object-cover object-center"
                        alt="thumbnail">
                    <div class="flex w-full justify-between px-3">
                        <div>
                            <h1 id="newstitle" class="font-zalando h-6 text-[19px] font-bold tracking-wider"> {{Str::limit($blog["title"],20)}} </h1>
                            <p class="font-zalando text-[15px] tracking-wider"> Sender </p>
                        </div>
                        <h3 id="newstimeline" class="font-bebas mr-2 text-[16px] font-medium">{{$blog["created_at"]->diffForHumans()}}</h3>
                    </div>
                    <p class="font-zalando ml-3 text-[16px] font-medium"> {{Str::limit($blog["blog"],80)}} </p>
                    <h1 class="font-bebas ml-3 text-xl font-thin text-blue-500"><a href="/singlenews/{{$blog["id"]}}"> read more <i
                    class="bi bi-chevron-double-right"></i> </a></h1>
                </article>
            @endforeach            
        </div>
        {{-- <div class=" w-screen h-screen bg-blue-400 absolute top-0 left-0 flex flex-col " >
            <div class="w-full h-auto py-6 px-2 border-b-2 border-black " >
                <input type="text" name="newstitle" id="newstitle" class="bg-black/0 border-black border-4 h-full w-20" >
            </div>            
        </div> --}}
    </main>
</x-layout>
