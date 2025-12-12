<x-layout>
    <x-slot:title>updateprofile</x-slot:title>
    <h1>make the post big guy</h1>
    <main>
        <form action="/updateprofile" method="POST">
            @csrf
            <label for="title" class="flex flex-col gap-2" >
                <h1>title</h1>
                <input name="title" id="title" type="text">
            </label>
            <input type="text" value={{ Auth::user()->getKey() }} name="sender" id="sender" hidden>
            <label for="blog" class="flex flex-col gap-2" >
                <h1>blog</h1>
                <textarea class="resize-none" name="blog" id="blog" type="text"></textarea>
            </label>
            <button type="submit">yeahhh update it</button>
        </form>
    </main>
</x-layout>
