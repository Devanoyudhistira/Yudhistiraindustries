<x-layout>
<x-slot:title>news</x-slot:title>
<x-navbar>title</x-navbar>
<main class="flex flex-col w-screen mt-10 h-20 " >
    <img src="{{ asset('image/image2.jpg') }}" class="w-screen h-120 object-center object-cover" alt="">
    <div class="border-b-3 border-black pb-3" >
    <h1 class="font-zalando text-6xl font-semibold tracking-widest" >{{ $news["title"] }} </h1>
    <p> {{ $news["created_at"]->diffForHumans() }} </p>    
    </div>
    <article class="font-zolando text-xl text-left w-screen mt-3" >
        {{ $news["blog"] }}
    </article>


</main>

</x-layout>
