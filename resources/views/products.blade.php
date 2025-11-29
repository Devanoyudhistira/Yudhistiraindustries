<x-layout>
<x-slot:title>products</x-slot:title>
<x-navbar> Product page </x-navbar>
<main class="w-screen h-auto" >
<h1 x-init="console.log('oke')" class="font-orbit text-4xl" >Our Products</h1>
<article class="grid grid-cols-4 gap-4 " >
   @for ($i = 0; $i < 10;$i++)
   <div id="productCard" class="bg-zinc-900 flex flex-col items-center w-54 h-75 border-2 border-zinc-100" >
    <div class="bg-red-600 mt-5 w-[90%] h-[40%]" ></div>
    <div class="flex justify-around w-[90%] text-zinc-100 font-orbit" >
        <h3>water cctv</h3>
        <h3>$19.0</h3>
    </div>
    <button class="bg-zinc-200 rounded-xl flex justify-center items-center mt-20 w-[90%] h-10 font-bebas font-medium text-2xl tracking-wider px-1 py-3 text-zinc-950" >purchase</button>
   </div>
   @endfor
</article>

</main>
</x-layout>
