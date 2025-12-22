<x-layout>
    <x-navbar>News</x-navbar>
    <x-slot:title> news </x-slot:title>
    <main class="mt-8 flex flex-col" x-data="{blogform:false}" >
        <form  method="GET" class="mt-13 self-center relative flex gap-4">
            @if ($searchmode != null)            
            <a href="/news"> <button> <i class="bi bi-arrow-left text-red-500 text-4xl" ></i> </button></a>
            @endif
            <input class="border-3 h-13 py-2 pl-3 mr-3 w-70 lg:w-90 rounded-2xl border-zinc-950" name="search" type="search" placeholder="search">
            <button type="submit" class=" flex justify-center rounded-xl items-center w-15 h-13 bg-blue-500 absolute z-10 top-0 -right-15" >
            <i class="bi bi-search text-3xl" ></i>
            </button>
        </form>
        <div class="mt-8 grid w-screen grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4 px-10 lg:px-3 py-2 place-items-center relative place-content-center">
            @if (count($datablogs) <= 0)
            <div class="top-[30%] left-[33%] absolute" >
            <h1 class="font-zalando text-5xl lg:text-7xl tracking-wide font-semibold "> news not found </h1>
            <p class="font-zalando text-xl lg:text-3xl tracking-wide font-thin " > try another keyword </p>
            </div>
            @endif
            @foreach ($datablogs as $blog)
                <article
                    class="lg:w-90 w-90 h-60 lg:h-69 mt-3 pb-4 flex flex-col overflow-hidden rounded-xl rounded-t-2xl border-x-2 border-b-2 border-t-8 border-black border-x-zinc-100 border-t-zinc-800 shadow-[8px_8px_0px_black]">
                     <img src="{{ asset(($blog['thumbnail'])) }}" class="h-[50%] w-full object-cover object-center"
                        alt="thumbnail">
                    <div class="flex w-full justify-between px-3">
                        <div>
                            <h1 id="newstitle" class="font-zalando h-6 text-[19px] font-bold tracking-wider"> {{Str::limit($blog["title"],20)}} </h1>
                            <p class="font-zalando text-[15px] tracking-wider"> {{ $blog->author->name }} </p>
                        </div>
                        <h3 id="newstimeline" class="font-bebas mr-2 text-[16px] font-medium">{{$blog["created_at"]->diffForHumans()}}</h3>
                    </div>
                    <p class="font-zalando ml-3 text-[16px] font-medium"> {{Str::limit($blog["blog"],20)}} </p>
                    <h1 class="font-bebas ml-3 text-xl font-thin text-blue-500"><a href="/singlenews/{{$blog["id"]}}"> read more <i
                    class="bi bi-chevron-double-right"></i> </a></h1>
                </article>                
            @endforeach            
        </div>        
        @if (Auth::check() && Auth::user()->role === 'staff')
        <div class="absolute z-60 right-10 bottom-10 w-max h-max px-1 bg-zinc-950 py-1 rounded-full border-4 border-zinc-500 shadow-[4px_4px_0_black] hover:scale-80 transition focus:scale-80 cursor-pointer" > 
            <a href="/makenews"> <button x-on:click="blogform = !blogform" > 
                <i class="bi bi-plus text-6xl text-zinc-100" ></i>
            </button> </a>
        </div>
        @endif
    </main>
</x-layout>
