<x-layout>
    <x-slot:title> login </x-slot:title>
    <div class="flex h-screen w-screen flex-col items-center justify-center gap-4 bg-zinc-950">
        @if ($errors->hasAny(['email', 'name', 'password']))
            <h1 class="font-bebas text-3xl font-medium text-red-700"> password or username wrong </h1>
        @endif
        <h1 class="font-orbit text-center text-2xl lg:text-4xl font-bold tracking-tight text-white">YudhistiraIndustries</h1>
        <form action="/loginpage" method="POST" action="signin" method="POST"
            class="lg:w-160 w-120 h-100 border-3 font-orbit grid grid-cols-1 place-content-center place-items-center gap-y-8 rounded-2xl border-zinc-300 px-3 py-1 text-center text-xl font-medium text-zinc-200">
            @csrf
            <h1 class="font-orbit -ml-2 text-2xl font-bold tracking-wider text-white"> welcome back </h1>
            <label x-data="{ name: '' }" for="name" autocorrect="off" class="relative h-10 gap-3">
                <div class="flex items-center justify-start gap-3">
                    <h1>Username</h1>
                    <input x-model="name" class="input" type="text" name="name" id="name">
                </div>
            </label>
            <label for="password" class="flex h-10 items-center justify-start gap-3">
                <h1>Password</h1>
                <input class="input" type="password" name="password" id="password">
            </label>
            <button
                class="font-bebas border-3 inline-block rounded-xl border-zinc-200 px-4 py-1.5 text-3xl tracking-wider text-white duration-200 hover:bg-zinc-200 hover:text-zinc-900"
                type="submit">
                Login
            </button>
            <h1> don't have an account <a class="underline" href="/sign">Sign Up</a> </h1>
        </form>
    </div>

    <script>
        function textcount(textinput, massage) {
            const textlength = textinput.length < 8 && textinput.length >= 0
            return textlength ? massage : ""
        }
    </script>
</x-layout>
