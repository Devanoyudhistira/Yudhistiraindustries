<div x-transition x-show="flashmassage"
    class="lg:w-100 w-80 px-2 pr-10 z-100 border-l-5 absolute left-[10%] lg:left-[32%] top-20 flex h-25 lg:h-max flex-col items-center justify-between rounded-md {{ $success ? "border-green-400" : "border-red-700" }} bg-zinc-100 px-3 py-4">
    <div class="flex gap-2" >
        <i class=" bi {{ $success ?  'bi-check-circle text-green-400' : 'bi-x-circle text-red-700'}} text-4xl mt-2"></i>
        <h1 class="font-zalando text-xl lg:mt-0 lg:text-3xl font-semibold ">
            {{Str::limit($slot,40)}}  
        </h1>
    </div>
    <button
        class="focus:scale-85 font-bebas absolute right-0 -top-3 inline-block h-10 w-10 justify-self-end rounded-full font-semibold transition"
        x-on:click="flashmassage = false"> <i class="bi bi-x text-5xl "></i> </button>
</div>
