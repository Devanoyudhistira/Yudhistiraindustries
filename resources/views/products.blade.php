<x-layout>
    <x-slot:title>products</x-slot:title>
    <x-navbar>
        Product page
    </x-navbar>
    <main class="mt-12 h-auto w-screen">
        <h1 class="font-bebas text-4xl">Products</h1>
        <article x-data="{ open: false, id: 3,name: '', price: '', seller: '' }" class="grid grid-cols-4 gap-2 pl-9">
            @foreach ($products as $product)
                <div id="productCard" x-data="{ productname: '{{ $product['productname'] }}',productid:'{{ $product['id']  }}', productprice: '${{ $product['price'] }}', productseller: '{{ $product->seller->name }}' }"
                    class="w-54 h-75 flex flex-col items-center border-2 border-zinc-100 bg-zinc-900">
                    <img src={{ asset('image/product2.jpg') }} class="mt-5 h-[40%] w-[90%]"></img>
                    <div
                        class="font-bebas flex w-[90%] justify-between text-2xl font-medium tracking-wider text-zinc-100">
                        <h3>{{ $product['productname'] }}</h3>
                        <h3> <i class="bi bi-star text-2xl text-yellow-600"></i> 5.0 </h3>
                    </div>
                    <button x-on:click="name = productname;price = productprice;open = true;seller = productseller,id = productid"
                        class="font-bebas mt-20 flex h-10 w-[90%] items-center justify-center rounded-xl bg-zinc-200 px-1 py-3 text-2xl font-medium tracking-wider text-zinc-950">
                        <i class="bi bi-cart"></i> ${{ $product['price'] }} </button>
                </div>
            @endforeach
            <div x-transition x-show="open"
                class="z-2000 absolute left-0 top-0 flex h-screen w-screen px-3 flex-col bg-zinc-200">
                <button class="absolute left-10 -top-5 items-self-start self-start justify-self-start text-[80px]"
                    x-on:click="open = false"> <i class="bi bi-x font-black text-red-600"></i> </button>
                <div class="mt-18 flex h-130 w-full">
                    <img src="{{ asset('image/product3.jpg') }}" id="productimage"
                        class="h-[70%] w-[70%] object-cover"></img>
                    <div class="flex h-[70%] w-full flex-col bg-zinc-100 border-l-2 border-black">
                        <h1 class="font-bebas ml-4 text-4xl font-medium" x-text="name"> </h1>
                        <div class="flex w-full flex-col gap-2">
                            <x-product-attr>
                                <h4>name:</h4>
                                <h4 x-text="name"></h4>
                            </x-product-attr>
                            <x-product-attr>
                                <h4>price:</h4>
                                <h4 x-text="price"></h4>
                            </x-product-attr>
                            <x-product-attr><h4>seller:</h4>
                                <h4 x-text="seller"> </h4>
                            </x-product-attr>
                            <x-product-attr>
                                <h4>arrival:</h4>
                                <h4>12-20-2027</h4>
                            </x-product-attr>
                            <div class="w-full px-4">
                                <h1 class="font-bebas text-2xl font-semibold">Description</h1>
                                <p class="font-bebas text-xl">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci ut, excepturi
                                    quia voluptatum minus odit ab similique totam at, molestiae fuga sunt, facere
                                    voluptate non expedita repudiandae accusantium itaque? Officia?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-data="button">
                    <button :click="buyproduct(id,'{{ Auth::user()->getkey() }}')"
                        class="items-self-center font-bebas text-xinc-200 align-center  ml-60 w-[60%] justify-self-center rounded-xl border-2 bg-zinc-900 text-center text-2xl font-semibold tracking-wider text-zinc-100 duration-100 hover:border-black hover:bg-zinc-200 hover:text-zinc-900">
                        <i class="bi bi-cart"></i> buy </button>
                </div>
            </div>
        </article>
    </main>
    <script>
       document.addEventListener('alpine:init', () => {
    Alpine.data("button", () => ({
        buyproduct(productid, buyer) {
            fetch("/purchase", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    productId: productid,
                    userid: buyer
                })
            })
            .then(res => res.json())
            .then(data => {
                console.log("Server response:", data);
            });
        }
    }))
})

    </script>
</x-layout>
