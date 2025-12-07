{{-- @dd($seller) --}}
<x-layout>
    <x-slot:title> Profile </x-slot:title>
    <x-navbar>Profile</x-navbar>
    <main class=" mt-10  flex flex-col">
        <div
            class="ml-2 mt-1 flex w-[98vw] flex-col rounded-xl border-2 border-black bg-zinc-200 px-3 py-3 shadow-[3px_3px_5px_black]">
            <div class="flex items-center gap-6">
                <img src="{{ asset('image/userpp/profile2.png') }}"
                    class="border-3 h-60 w-60 rounded-full border-black object-cover" alt="profile" srcset="">
                <h1 class="font-bebas text-5xl font-semibold tracking-widest"> {{ $datauser->name }} </h1>
            </div>
            <article x-data="{ invoicedata: true,productform:false }" class="mt-2 flex w-full flex-col border-t-2 border-black bg-zinc-200 py-4">
                <div id="category" class="-mt-[15px] flex">
                    @if (Auth::user()->role === 'seller')
                        <button x-on:click="invoicedata = true"
                            class="border-t-3 font-bebas ml-6 w-min rounded-bl-2xl border-black bg-zinc-200 px-3 py-2 text-4xl capitalize tracking-tighter shadow-[2px_2px_4px_black]">
                            purchased </button>
                        <button x-on:click="invoicedata = false"
                            class="border-t-3 font-bebas w-min rounded-br-2xl border-black bg-zinc-200 px-3 py-2 text-4xl capitalize tracking-tighter shadow-[2px_2px_4px_black]">
                            selling </button>
                    @endif
                </div>
                <div class="w-full">
                    <div class="grid grid-cols-4" x-show="invoicedata" x-transition>
                        @if (count($products) <= 0)
                            <x-productform>
                                <x-slot:text1>
                                    <h1 class="font-bebas text-6xl font-bold"> you not buy anyting yet :(</h1>
                                </x-slot:text1>
                                <x-slot:text2>
                                    click <a class="text-blue-600" href="/products"> here</a> to start shopping </p>
                                </x-slot:text2>
                             </x-productform>
                        @else
                            @for ($i = 0; $i < count($products); $i++)
                                <div
                                    class="w-70 h-65 mt-4 flex flex-col gap-2 rounded-[10px] border border-black bg-zinc-100 px-2 py-3">
                                    <img src="{{ asset('image/product1.jpg') }}"
                                        class="border-3 ml-4 h-[55%] w-[90%] rounded-[10px] object-cover" alt="profile"
                                        srcset="">
                                    <h1 class="font-bebas text-2xl font-semibold tracking-widest"> {{ $products[$i] }}
                                        <h1>
                                            <h1 class="font-bebas text-2xl font-semibold tracking-widest">
                                                ${{ $productprice[$i] }} <h1>

                                </div>
                            @endfor
                        @endif
                    </div>
                    <div class="grid grid-cols-4" x-show="!invoicedata" x-transition>
                        @if (count($seller) <= 0)
                            <x-productform>
                                <x-slot:text1>
                                    <h1 class="font-bebas text-6xl font-bold"> you not sell anything yet :(</h1>
                                </x-slot:text1>
                                <x-slot:text2>
                                click <button x-on:click="productform = true" class="inline-block font-medium rounded-xl bg-blue-400 px-2 py-1 text-zinc-900"> here</button> to start sell product </p>
                                </x-slot:text2>
                             </x-productform>
                        @else
                        <div x-on:click="productform = true" x-show="!invoicedata" x-transition
                                class="w-70 h-65 gap-3 mt-4 flex flex-col rounded-[10px] border-dashed border-2 border-black bg-zinc-100 px-2 py-3 justify-center items-center">
                                <button  > <i class="bi bi-plus text-8xl" ></i></button>
                                <h1 class="font-zalando text-3xl font-medium" > sell product here </h1>
                            </div>
                        @foreach ($seller as $sell)
                            <div x-show="!invoicedata" x-transition
                                class="w-70 h-65 mt-4 flex flex-col gap-2 rounded-[10px] border border-black bg-zinc-100 px-2 py-3">
                                <img src="{{ asset('image/product3.jpg') }}"
                                    class="border-3 ml-4 h-[55%] w-[90%] rounded-[10px] object-cover" alt="profile"
                                    srcset="">
                                <h1 class="font-bebas text-2xl font-semibold tracking-widest"> {{ $sell["productname"] }}<h1>
                            </div>
                        @endforeach
                        @endif
                    </div>
                    <div x-show="productform" x-transition class="w-screen h-screen flex justify-center items-center bg-zinc-950/30  absolute top-[5%] left-[0%]" >
                        <div class="w-[85vw] h-[88vh] bg-zinc-200 border-4 border-black">
                            <div class="flex w-full justify-between" >
                            <h1 class="text-6xl font-bebas font-bold tracking-widest" >sell your product</h1>
                            <i x-on:click="productform = false" class="bi bi-x text-6xl text-red-700" ></i>
                            </div>
                            <form enctype="multipart/form-data" action="/product" method="post" class="flex flex-col gap-2 p-3 py-6" >
                                @csrf
                                <x-productinput>
                                     <x-slot:inputitle> product name </x-slot:inputitle>
                                      <x-slot:inputtype> productname </x-slot:inputtype>
                                </x-productinput>
                                <x-productinput>
                                     <x-slot:inputitle> product price </x-slot:inputitle>
                                      <x-slot:inputtype> productprice </x-slot:inputtype>
                                </x-productinput>
                                <label for="productimage">
                                    <h1 class="font-zalando text-xl" >image:</h1>
                                    <input class="bg-red-600" type="file" name="productimage" id="productimage" >
                                </label>
                                <label for="description" class="flex flex-col">
                                    <h1 class="font-bebas text-3xl tracking-widest font-semibold" > Description </h1>
                                    <textarea name="description" id="description" rows="6" class="inline-block font-zalando focus:none border-black border-3 "></textarea>
                                </label>
                                <button type="submit" class="px-2 transition hover:scale-[86%] py-3 w-60 justify-self-center self-center font-bebas text-3xl bg-zinc-200 border-4 border-black hover:shadow-[6px_6px_0_black] shadow-[3px_3px_0_black]" >create</button>
                            </form>
                        </div>
                    </div>
            </article>
    </main>
    </div>

</x-layout>
