<x-layout>
    <x-slot:title> Create</x-slot:title>
    <x-navbar> Create News </x-navbar>
    <main class="mt-14 h-screen w-[99vw] px-2">

        <form enctype="multipart/form-data" action="/postblog" method="POST" class="h-screen rounded-xl border-t-2 border-black px-2">
            @csrf
            <label for="title" class="flex w-max flex-col">
                <input placeholder="blog title" name="title" id="title" type="text"
                    class="font-zalando placeholder:text-zinc-700 placeholder:font-bebas ring-none border-none text-4xl font-bold outline-none">
            </label>
            <label x-data="{
                imgprev: null
            }" for="thumbnail"
                class="lg:h-125 h-80 border-3 relative grid w-full cursor-pointer place-items-center border-dashed">                
                <div x-show="!imgprev" class="flex flex-col items-center justify-center gap-2">
                    <i class="bi bi-images text-6xl text-zinc-800"></i>
                    <h1 class="font-bebas text-4xl font-semibold">
                    add thumbnail (max:10MB)
                    </h1>
                </div>
                <input hidden accept="image/*" type="file" name="thumbnail" id="thumbnail"
                    @change=" const file = $event.target.files[0];
                                            if (file) {
                                                imgprev = URL.createObjectURL(file);
                                            }">
                <img x-show="imgprev" :src="imgprev"
                    class="absolute inset-0 h-full w-full object-fit object-center" alt="preview">
            </label>            
            <label x-data class="flex h-[79%] mt-3 flex-col gap-2">
                <textarea x-ref="textarea" placeholder="blog body"
                    @input = " $refs.textarea.style.height = 'auto';
            $refs.textarea.style.height = $refs.textarea.scrollHeight + 'px';"
                    class="ring-none placeholder:text-zinc-700 placeholder:font-bebas -mt-2 h-full w-full resize-none border-none text-2xl outline-none" name="blog" id="blog"
                    rows="1"></textarea>
            </label>
            <div class="mb-2 flex justify-end">
                <div class="border-t-3 mt-2 flex w-full justify-end gap-3 border-black pt-3">
                    <a href="/news"> <button
                            class="font-bebas cursor-pointer rounded-sm bg-red-700 px-2 py-1 text-2xl font-bold tracking-wider">cancel</button>
                    </a>
                    <button
                        class="font-bebas cursor-pointer rounded-sm bg-sky-700 px-2 py-1 text-2xl font-bold tracking-wider"
                        type="submit">Post</button>
                </div>
            </div>
        </form>
    </main>
</x-layout>
