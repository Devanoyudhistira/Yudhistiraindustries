<div x-transition x-show="flashmassage"
    class="w-100 px-2 pr-10 z-100 border-l-5 absolute left-[32%] top-20 flex h-max flex-col justify-between rounded-md {{ $success ? "border-green-400" : "border-red-700" }} bg-zinc-100 px-3 py-4">
    <div class="flex gap-2" >
        <i class=" bi {{ $success ?  'bi-check-circle text-green-400' : 'bi-x-circle text-red-700'}} text-4xl mt-2"></i>
        <h1 class="font-zalando text-3xl font-semibold ">
            {{$slot}}  
        </h1>
    </div>
    <button
        class="focus:scale-85 font-bebas absolute right-0 -top-3 inline-block h-10 w-10 justify-self-end rounded-full font-semibold transition"
        x-on:click="flashmassage = false"> <i class="bi bi-x text-5xl "></i> </button>
</div>
