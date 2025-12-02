<x-layout>
    <x-slot:title>products</x-slot:title>
    <x-navbar>
        Product page
    </x-navbar>
    <main class="h-auto w-screen">
        <h1 class="font-bebas text-4xl">Products</h1>
        <article x-data="{ open: false }" class="grid grid-cols-4 gap-2 pl-9">
            @foreach ($products as $product)
                <div id="productCard" class="w-54 h-75 flex flex-col items-center border-2 border-zinc-100 bg-zinc-900">
                    <img src={{ asset('image/product2.jpg') }} class="mt-5 h-[40%] w-[90%]"></img>
                    <div
                        class="font-bebas flex w-[90%] justify-between text-2xl font-medium tracking-wider text-zinc-100">
                        <h3>{{ $product['productname'] }}</h3>
                        <h3> <i class="bi bi-star text-2xl text-yellow-600"></i> 5.0 </h3>
                    </div>
                    <button x-on:click="open = ! open"
                        class="font-bebas mt-20 flex h-10 w-[90%] items-center justify-center rounded-xl bg-zinc-200 px-1 py-3 text-2xl font-medium tracking-wider text-zinc-950">
                        <i class="bi bi-cart"></i> ${{ $product['price'] }} </button>
                </div>
            @endforeach
            <div x-transition x-show="open"
                class="z-2000 absolute justify-evenly left-0 top-0 flex h-screen w-screen flex-col bg-zinc-200">
                <button x-on:click="open = ! open"> <i class="bi bi-x absolute top-0 left-0 text-[80px] self-start items-self-start justify-self-start font-black text-red-600"></i> </button>
                <div class="flex w-full h-full -mt-10" >
                    <img src="{{ asset("image/product3.jpg") }}" id="productimage" class="w-[70%] h-[70%] object-cover"></img>
                    <div class="flex-col flex w-full h-[70%] bg-zinc-100">
                      <h1 class="text-4xl font-bebas font-medium " > nama barang </h1>
                      <div class="flex flex-col w-full gap-2" >                        
                        <x-product-attr>
                            <h4>name:</h4>
                            <h4>nama produk</h4>
                        </x-product-attr>
                        <x-product-attr>
                            <h4>price:</h4>
                            <h4>$25.00</h4>
                        </x-product-attr>
                        <x-product-attr>
                            <h4>seller:</h4>
                            <h4>devano</h4>
                        </x-product-attr>
                        <x-product-attr>
                            <h4>arrival:</h4>
                            <h4>12-20-2027</h4>
                        </x-product-attr>
                        <div class="w-full px-4" > 
                            <h1 class="font-bebas text-2xl font-semibold" >Description</h1>
                            <p class="font-bebas text-xl " >
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci ut, excepturi quia voluptatum minus odit ab similique totam at, molestiae fuga sunt, facere voluptate non expedita repudiandae accusantium itaque? Officia?
                            </p>
                        </div>                        
                      </div>
                    </div>
                </div>
                <button class="w-[60%] ml-60 justify-self-center items-self-center rounded-xl border-2 hover:border-black hover:bg-zinc-200 hover:text-zinc-900 duration-100 -mt-40 text-center bg-zinc-900 text-zinc-100 font-bebas font-bold text-xinc-200 align-center text-2xl"> <i class="bi bi-cart"></i> buy </button>
            </div>
        </article>
    </main>
</x-layout>
