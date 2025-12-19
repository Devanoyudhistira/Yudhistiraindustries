<x-layout>
    <x-slot:title> Profile </x-slot:title>
    <x-navbar>Profile</x-navbar>
    <main class="mt-10 flex flex-col" x-data="{ flashmassage: true, updateprofile: false }">
        @if (session('success'))
            <x-flash-massage :success="true">
                {{ Str::limit(session('success'), 40) }}
            </x-flash-massage>
        @endif
        @if ($errors->any())
            <x-flash-massage :success="false">
                {{-- {{ $errors->first() }}  --}} product name cannot be more than 8
            </x-flash-massage>
        @endif
        <div
            class="ml-2 mt-1 flex w-[98vw] flex-col rounded-xl border-2 border-black bg-zinc-200 px-3 py-3 shadow-[3px_3px_5px_black]">
            <div class="flex items-center justify-between gap-6">
                <div class="relative flex items-center gap-6">
                    <img  src="{{ asset('storage/' . ($datauser['profileimage'] ?? 'proflleimage/profile.jpeg')) }}"
                        class="border-3 h-60 w-60 rounded-full border-black object-cover" alt="profile" srcset="">
                    <h1 class="font-bebas text-5xl font-semibold tracking-widest"> {{ $datauser->name }} </h1>                    
                </div>
            </div>
            <article x-data="{ invoicedata: true, productform: false }" class="mt-2 flex w-full flex-col border-t-2 border-black bg-zinc-200 py-4">
                <div id="category" class="-mt-[15px] flex">
                    @if ($datauser->role === 'seller')
                        <button x-on:click="invoicedata = true"
                            class='border-t-3 font-bebas ml-6 w-min rounded-bl-2xl border-black px-3 py-2 text-4xl capitalize tracking-tighter shadow-[2px_2px_4px_black]'
                            :class="{
                                'border-b-4 border-b-blue-600': invoicedata,
                                '': !invoicedata
                            }">
                            purchased </button>
                        <button x-on:click="invoicedata = false"
                            class="border-t-3 font-bebas w-min rounded-br-2xl border-black bg-zinc-200 px-3 py-2 text-4xl capitalize tracking-tighter shadow-[2px_2px_4px_black]"
                            :class="{
                                'border-b-4 border-b-red-700': !invoicedata,
                                '': invoicedata
                            }">
                            selling </button>
                    @endif
                </div>
                <div id="itemcontainer" class="w-full">
                    <div class="grid grid-cols-4" x-show="invoicedata" x-transition>
                        @if (count($products) <= 0)
                            <x-productform>
                                <x-slot:text1>
                                    <h1 class="font-bebas text-6xl font-bold"> there is no purchased</h1>
                                </x-slot:text1>
                                <x-slot:text2>
                                    <p></p>
                                </x-slot:text2>
                            </x-productform>
                        @else
                            @for ($i = 0; $i < count($products); $i++)
                                <div
                                    class="w-70 h-65 mt-4 flex flex-col gap-2 rounded-[10px] border border-black bg-zinc-100 px-2 py-3">
                                    <img src="{{ asset('storage/' . $productimage[$i]) }}"
                                        class="border-3 ml-4 h-[55%] w-[90%] rounded-[10px] object-cover" alt="profile"
                                        srcset="">
                                    <h1 class="font-bebas text-2xl font-semibold tracking-widest"> {{ $products[$i] }}
                                        <h1 class="font-bebas text-2xl font-semibold tracking-widest">
                                            ${{ $productprice[$i] }} <h1>
                                                <h1 class="font-bebas -mt-6 text-2xl font-semibold tracking-widest">
                                                    {{ $purchasedate[$i]['created_at']->diffForHumans() }} <h1>

                                </div>
                            @endfor
                        @endif
                    </div>
                    <div class="grid grid-cols-4" x-show="!invoicedata" x-transition>
                        @if (count($seller) <= 0)
                            <x-productform>
                                <x-slot:text1>
                                    <h1 class="font-bebas text-6xl font-bold"> this user not sell anything :(</h1>
                                </x-slot:text1>
                                <x-slot:text2>                                    
                                    <p></p>
                                </x-slot:text2>
                            </x-productform>
                        @else
                            <div x-on:click="productform = true" x-show="!invoicedata" x-transition
                                class="w-70 h-65 hidden mt-4  gap-3 rounded-[10px] border-2 border-dashed border-black bg-zinc-100 px-2 py-3">
                                                           
                            </div>
                            @foreach ($seller as $sell)
                                <div x-show="!invoicedata" x-transition
                                    class="w-70 h-65 mt-4 flex flex-col items-center gap-2 rounded-[10px] border border-black bg-zinc-100 px-2 py-3">
                                    <img src="{{ asset('storage/' . $sell['image']) }}"
                                        class="border-3 h-[55%] w-[90%] rounded-[10px] object-cover" alt="profile"
                                        srcset="">

                                    <h1 class="font-bebas text-2xl font-semibold tracking-widest">
                                        {{ $sell['productname'] }}<h1>
                                            <form method="POST" action="/purchase">
                                                @csrf
                                                <input hidden value={{ $sell['id'] }} name="productId">                                                
                                                <button type="submit" data-productid={{ $sell['id'] }}
                                                    class="deletebutton font-zolando focus:scale-80 inline-block w-max rounded-xl transititon bg-zinc-950 text-white px-3 py-2 pr-4 border-3 border-white text-center text-2xl font-semibold transition hover:border-2 hover:border-black hover:bg-zinc-200 hover:text-black">
                                                    <i class="bi bi-shopping-cart text-2xl text-black"></i> Purchase </button>
                                            </form>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div x-show="productform" x-transition
                        class="absolute left-[0%] top-[5%] flex h-[200%] w-full items-center justify-center bg-zinc-950/30">
                        <div x-data="{ buying: false }"
                            class="absolute top-20 h-max w-[65vw] border-4 border-black bg-zinc-200 px-2 py-4">
                            <div class="flex w-full justify-between">
                                <h1 class="font-bebas text-4xl font-bold tracking-widest">sell your product</h1>
                                <i x-on:click="productform = false" class="bi bi-x text-6xl text-red-700"></i>
                            </div>                           
                        </div>
                    </div>
            </article>
            <div x-data="{ buying: false }" x-show="updateprofile" x-transition
                class="absolute left-[0%] top-[5%] flex h-screen w-screen items-center justify-center bg-zinc-950/30">
                <div class="h-max w-[65vw] border-4 border-black bg-zinc-200 px-2 py-5">
                    <div class="flex w-full justify-between">
                        <h1 class="font-bebas text-4xl font-bold tracking-widest">edit profile</h1>
                        <i x-on:click="updateprofile = false" class="bi bi-x text-6xl text-red-700"></i>
                    </div>                   
                </div>
            </div>
    </main>
    </div>
</x-layout>
