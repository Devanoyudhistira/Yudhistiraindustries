<x-layout>
    <x-slot:title> Create</x-slot:title>
    <x-navbar> Create News </x-navbar>
    <main class="mt-14 h-screen w-[99vw] px-2">

        <form action="/postblog" method="POST" class="rounded-xl border-2 h-screen border-black px-2">
            @csrf
            <label for="title" class="flex w-max flex-col gap-2">
                <h1>title</h1>
                <input name="title" id="title" type="text" class="font-zalando text-3xl [all:unset]">
            </label>
            <input type="text" value={{ Auth::user()->getKey() }} name="sender" id="sender" hidden>
            <label x-data class="flex flex-col gap-2 h-[79%]">
                <h1>blog</h1>
                <textarea x-ref="textarea"
                    @input = " $refs.textarea.style.height = 'auto';
            $refs.textarea.style.height = $refs.textarea.scrollHeight + 'px';"
                    class="-mt-2 w-full h-full resize-none border-none outline-none ring-none" name="blog" id="blog" rows="1"></textarea>
            </label>
            <div class="mb-2 flex justify-end">
                <div class="flex w-full justify-end pt-3 mt-2 border-t-3 border-black gap-3">
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
