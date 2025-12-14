<x-layout>
    <x-slot:title>updateprofile</x-slot:title>
    <x-navbar> update </x-navbar>
    <h1>make the post big guy</h1>
    <main class="mt-12" >
        <form action="/updateprofile" enctype="multipart/form-data" method="POST">
            @csrf
            <label for="newname" class="flex flex-col gap-2" >
                <h1>name</h1>
                <input name="newname" id="newname" type="newname">
            </label>            
            <label for="newimage" class="flex flex-col gap-2" >
                <h1>image</h1>
                <input type="file" class="resize-none" name="newimage" id="newimage" type="newimage"></input>
            </label>
            <button type="submit">yeahhh update it</button>
        </form>
    </main>
</x-layout>
