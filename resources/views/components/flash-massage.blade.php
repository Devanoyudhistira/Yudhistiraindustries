<div x-transition x-show="flashmassage"
    class="w-max px-2 z-100 border-l-5 absolute left-[32%] top-20 flex h-max flex-col justify-between rounded-md {{ $success ? "border-green-400 text-green-400" : "border-red-700 text-red-700" }} bg-zinc-100 px-3 py-4">
    <div>
        <h1 class="font-zalando text-3xl font-semibold ">
            <i class="bi bi-check-circle "></i>
            {{$slot}}  
        </h1>
    </div>
    <button
        class="focus:scale-85 font-bebas absolute right-2 top-2 inline-block h-10 w-10 justify-self-end rounded-full font-semibold transition"
        x-on:click="flashmassage = false"> <i class="bi bi-x text-3xl "></i> </button>
</div>
