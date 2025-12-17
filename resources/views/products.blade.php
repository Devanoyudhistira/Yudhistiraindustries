<x-layout>
    <x-slot:title>products</x-slot:title>
    <x-navbar>
        Product page
    </x-navbar>
    <main class="mt-12 h-auto w-screen" x-data={flashmassage:true}>
        @if (session('success'))
            <x-flash-massage :success="true">
                {{ Str::limit(session('success'), 40) }}
            </x-flash-massage>
        @endif
        <h1 class="font-bebas text-4xl">Products</h1>
        <article x-data="{ open: false, id: 0, name: '', price: '', seller: '', image: '', description: '', sellerid: '' }" class="grid grid-cols-4 gap-2 pl-9">
            @foreach ($products as $product)
                <div id="productCard" x-data="{ productname: '{{ $product['productname'] }}', productid: '{{ $product['id'] }}', productprice: '${{ $product['price'] }}', productdesc: '{{ $product['description'] }}', productseller: '{{ $product->seller->name }}', productimage: '{{ $product['image'] }}', productsellerid: '{{ $product->seller['user_id'] }}' }"
                    class="w-54 h-75 flex flex-col items-center border-2 border-zinc-100 bg-zinc-900">
                    <img src={{ asset('storage/' . $product['image']) }}
                        class="mt-5 h-[40%] w-[90%] object-cover object-center"></img>
                    <div
                        class="font-bebas flex w-[90%] flex-col justify-between text-2xl font-medium tracking-wider text-zinc-100">
                        <h3>{{ Str::limit($product['productname'], 15) }}</h3>
                        <h6 class="-mt-2 text-xl text-zinc-700"> <a
                                href="userprofile/{{ $product->seller['user_id'] }}"> {{ $product->seller->name }}
                            </a></h6>
                    </div>
                    <button
                        x-on:click="name = productname;description = productdesc;price = productprice;open = true;seller = productseller,id = productid;image=productimage;sellerid=productsellerid "
                        class="font-bebas mt-12 flex h-10 w-[90%] items-center justify-center rounded-xl bg-zinc-200 px-1 py-3 text-2xl font-medium tracking-wider text-zinc-950">
                        <i class="bi bi-cart"></i> ${{ $product['price'] }} </button>
                </div>
            @endforeach
            <div x-transition x-show="open" x-data="{ buying: false }"
                class="z-2000 absolute left-0 top-0 flex h-screen w-screen flex-col bg-zinc-200 px-3">
                <button class="items-self-start absolute -top-5 left-10 self-start justify-self-start text-[80px]"
                    x-on:click="open = false"> <i class="bi bi-x font-black text-red-600"></i> </button>
                <div class="mt-18 h-130 flex w-full">
                    <img :src="'{{ asset('storage') }}/' + image" id="productimage"
                        class="h-[70%] w-[70%] object-cover"></img>
                    <div class="flex h-[70%] w-full flex-col border-l-2 border-black bg-zinc-100">
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
                            <x-product-attr>
                                <h4>seller:</h4>
                                <a :href="'userprofile/' + sellerid">
                                    <h4 x-text="seller"> </h4>
                                </a>
                            </x-product-attr>
                            <x-product-attr>
                                <h4>arrival:</h4>
                                <h4>12-20-2027</h4>
                            </x-product-attr>
                            <div class="w-full px-4">
                                <h1 class="font-bebas text-2xl font-semibold">Description</h1>
                                <p class="font-bebas text-xl" x-text="description">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @if (Auth::check())
                    <form method="POST" x-on:submit="buying = true" x-data="button" action="/purchase">
                        @csrf
                        <input hidden :value="id" name="productId">
                        <button type="submit" :disabled="buying"
                            class="items-self-center font-bebas text-xinc-200 align-center ml-60 w-[60%] justify-self-center rounded-xl border-2 text-center text-2xl font-semibold tracking-wider text-zinc-100 duration-100"
                            :class="{
                                'bg-zinc-200 text-zinc-950': buying,
                                'bg-zinc-900 hover:text-zinc-900 hover:border-black hover:bg-zinc-200': !buying
                            }">
                            <i class="bi bi-cart"></i> <span x-text="buying ? 'loading' : 'purchase' "></span> </button>
                    </form>
                @else
                    <a href="/sign"
                        class="items-self-center font-bebas align-center ml-60 w-[60%] justify-self-center rounded-xl border-2 bg-sky-600 text-center text-2xl font-semibold tracking-wider text-zinc-950 duration-100">
                        You need to login first
                    </a>
                @endif
            </div>
        </article>
    </main>
</x-layout>
