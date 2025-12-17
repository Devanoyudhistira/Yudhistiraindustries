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
                    <button x-on:click="updateprofile = true"
                        class="border-3 left-54 absolute bottom-10 h-max w-max rounded-full border-black bg-zinc-100 p-2">
                        <i class="bi bi-pencil-square text-4xl"></i>
                    </button>
                </div>
            </div>
            <article x-data="{ invoicedata: true, productform: false }" class="mt-2 flex w-full flex-col border-t-2 border-black bg-zinc-200 py-4">
                <div id="category" class="-mt-[15px] flex">
                    @if (Auth::user()->role === 'seller' )
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
                                    <h1 class="font-bebas text-6xl font-bold"> you not sell anything yet :(</h1>
                                </x-slot:text1>
                                <x-slot:text2>
                                    click <button x-on:click="productform = true"
                                        class="inline-block rounded-xl bg-red-600 px-2 py-1 font-medium text-zinc-950">
                                        here</button> to start sell product </p>
                                </x-slot:text2>
                            </x-productform>
                        @else
                            <div x-on:click="productform = true" x-show="!invoicedata" x-transition
                                class="w-70 h-65 mt-4 flex flex-col items-center justify-center gap-3 rounded-[10px] border-2 border-dashed border-black bg-zinc-100 px-2 py-3">
                                <button> <i class="bi bi-plus text-8xl"></i></button>
                                <h1 class="font-zalando text-3xl font-medium"> sell product here </h1>
                            </div>
                            @foreach ($seller as $sell)
                                <div x-show="!invoicedata" x-transition
                                    class="w-70 h-65 mt-4 flex flex-col items-center gap-2 rounded-[10px] border border-black bg-zinc-100 px-2 py-3">
                                    <img src="{{ asset('storage/' . $sell['image']) }}"
                                        class="border-3 h-[55%] w-[90%] rounded-[10px] object-cover" alt="profile"
                                        srcset="">

                                    <h1 class="font-bebas text-2xl font-semibold tracking-widest">
                                        {{ $sell['productname'] }}<h1>
                                            <form method="POST" action="/deleteproduct">
                                                @csrf
                                                <input type="text" hidden name="productid"
                                                    value={{ $sell['id'] }}>

                                                <button type="submit" data-productid={{ $sell['id'] }}
                                                    class="deletebutton font-zolando focus:scale-80 inline-block w-max rounded-xl bg-red-700 px-3 py-2 pr-4 text-center text-2xl font-semibold transition hover:border-2 hover:border-black hover:bg-zinc-200 hover:text-black">
                                                    <i class="bi bi-trash text-2xl text-black"></i> Delete </button>
                                            </form>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div x-show="productform" x-transition
                        class="absolute left-[0%] top-[5%]  flex h-[200%] w-full items-center justify-center bg-zinc-950/30">
                        <div x-data="{ buying: false }" class="h-max w-[65vw] absolute top-20 border-4 border-black bg-zinc-200 px-2 py-4">
                            <div class="flex w-full justify-between" >
                                <h1 class="font-bebas text-4xl font-bold tracking-widest">sell your product</h1>
                                <i x-on:click="productform = false" class="bi bi-x text-6xl text-red-700"></i>
                            </div>
                            <form x-on:submit="buying = true" enctype="multipart/form-data" action="/product" method="post"
                                class="-mt-10 flex flex-col gap-2 p-3 py-6">
                                @csrf
                                <x-productinput autofocus type="text" name="productname" id="productname">
                                    <x-slot:inputitle> product name </x-slot:inputitle>
                                </x-productinput>
                                <x-productinput x-on:input="format()" name="productprice" id="productprice"
                                    type="number" step="any">
                                    <x-slot:inputitle> product price </x-slot:inputitle>
                                </x-productinput>
                                <label x-data="{
                                    imgprev: null
                                }" for="productimage"
                                    class="h-95 border-3 relative grid w-full cursor-pointer place-items-center border-dashed">
                                    <!-- placeholder -->
                                    <div x-show="!imgprev" class="flex flex-col items-center justify-center gap-2">
                                        <i class="bi bi-images text-6xl text-zinc-800"></i>
                                        <h1 class="font-bebas text-4xl font-semibold">
                                            put your image here
                                        </h1>
                                    </div>                                    
                                    <input hidden accept="image/*" type="file" name="productimage" id="productimage"
                                        @change=" const file = $event.target.files[0];
                                            if (file) {
                                                imgprev = URL.createObjectURL(file);
                                            }">                                  
                                    <img x-show="imgprev" :src="imgprev"
                                        class="absolute inset-0 h-full w-full object-cover object-center" alt="preview">
                                </label>
                                <label for="description" class="flex flex-col">
                                    <h1 class="font-bebas text-3xl font-semibold tracking-widest"> Description </h1>
                                    <textarea name="description" id="description" rows="5"
                                        class="font-zalando focus:none border-3 inline-block border-black"></textarea>
                                </label>
                                <button type="submit" :disabled="buying" class="font-bebas w-52 self-center justify-self-center border-4 border-black bg-zinc-200 px-2 py-2.5 text-3xl shadow-[3px_3px_0_black] transition hover:scale-[86%] hover:shadow-[6px_6px_0_black]" > <span x-text="buying ? 'loading...' : 'create' " ></span> </button>
                            </form>
                        </div>
                    </div>
            </article>
            <div  x-data="{ buying: false }" x-show="updateprofile" x-transition
                class="absolute left-[0%] top-[5%] flex h-screen w-screen items-center justify-center bg-zinc-950/30">
                <div class="h-max w-[65vw] border-4 border-black bg-zinc-200 px-2 py-5">
                    <div class="flex w-full justify-between">
                        <h1 class="font-bebas text-4xl font-bold tracking-widest">edit profile</h1>
                        <i x-on:click="updateprofile = false" class="bi bi-x text-6xl text-red-700"></i>
                    </div>
                    <form x-on:submit="buying = true"   enctype="multipart/form-data" action="/updateprofile"
                        method="post" class="-mt-5 flex flex-col gap-2 p-3 py-6">
                        @csrf
                        <label for="new name" class="flex flex-col">
                            <h1 class="font-sans text-2xl tracking-wider"> update name: </h1>
                            <input name="newname" id="newname"
                                class="font-zalando focus:none border-3 inline-block border-black"></input>
                        </label>
                        <label x-data="{
                                    imgprev: null
                                }" for="newimage"
                                    class="h-95 border-3 relative grid w-full cursor-pointer place-items-center border-dashed">                                    
                                    <div x-show="!imgprev" class="flex flex-col items-center justify-center gap-2">
                                        <i class="bi bi-images text-7xl text-zinc-800"></i>
                                        <h1 class="font-bebas text-5xl font-semibold">
                                            update your image here
                                        </h1>
                                    </div>                                    
                                    <input hidden accept="image/*" type="file" name="newimage" id="newimage"
                                        @change=" const file = $event.target.files[0];
                                            if (file) {
                                                imgprev = URL.createObjectURL(file);
                                            }">                                  
                                    <img x-show="imgprev" :src="imgprev"
                                        class="absolute inset-0 h-full w-full object-cover object-center" alt="preview">
                                </label>
                        <button type="submit" :disabled="buying" class="font-bebas w-52 self-center justify-self-center border-4 border-black bg-zinc-200 px-2 py-2.5 text-3xl shadow-[3px_3px_0_black] transition hover:scale-[86%] hover:shadow-[6px_6px_0_black]"><span x-text="buying ? 'loading...' : 'update' " ></span></button>
                    </form>
                </div>
            </div>
    </main>
    </div>    
</x-layout>
