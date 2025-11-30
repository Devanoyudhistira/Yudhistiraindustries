<x-layout>
<x-slot:title>products</x-slot:title>
<x-navbar> 
    Product page 
</x-navbar>
<main class="w-screen h-auto" >
<h1 class="font-bebas text-4xl" >Products</h1>
<article class="grid grid-cols-4 gap-2 pl-9 " >
   @for ($i = 1; $i < 8;$i++)
   <div id="productCard" class="bg-zinc-900 flex flex-col items-center w-54 h-75 border-2 border-zinc-100" >
    <img src={{ asset("image/product$i.jpg") }} class=" mt-5 w-[90%] h-[40%]" ></img>
    <div class="flex justify-between w-[90%] text-zinc-100 font-bebas font-medium tracking-wider text-2xl" >
        <h3>water cctv</h3>
        <h3 > <i class="bi bi-star text-yellow-600 text-2xl" ></i> 5.0 </h3>        
    </div>
    <button class="bg-zinc-200 rounded-xl flex justify-center items-center mt-20 w-[90%] h-10 font-bebas font-medium text-2xl tracking-wider px-1 py-3 text-zinc-950" > <i class="bi bi-cart" ></i> $19.9 </button>
   </div>
   @endfor
</article>

</main>
</x-layout>
