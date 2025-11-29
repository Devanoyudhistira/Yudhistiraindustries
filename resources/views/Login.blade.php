<x-layout>
    @if ($pagelogin)
        <x-slot:title> login </x-slot:title>
    @else
        <x-slot:title> Sign In </x-slot:title>
    @endif

    <div class="flex h-screen w-screen flex-col items-center justify-center gap-4 bg-zinc-950">
        <h1 class="font-orbit text-center text-4xl font-bold tracking-tight text-white">YudhistiraIndustries</h1>
        <form
            @if ($pagelogin) action="/loginpage" method="POST"
    @else
    action="signin"
 method="POST" @endif
            
            class="w-160 h-100 border-3 font-orbit grid grid-cols-1 place-content-center place-items-center gap-y-5 rounded-2xl border-zinc-300 px-3 py-1 text-center text-xl font-medium text-zinc-200">
            @csrf
            <h1 class="font-orbit -ml-2 text-2xl font-bold tracking-wider text-white"> Join Us </h1>
            @if (!$pagelogin)
                <label for="email" class="ml-15 flex h-10 items-center justify-start gap-3">
                    <h1>Email</h1>
                    <input class="rounded-xl border-2 border-zinc-200 px-2 py-1 focus:outline-none focus:ring-0"
                        type="email" name="email" id="email">
                </label>
            @endif
            <label for="name" autocorrect="off" class="flex h-10 items-center justify-start gap-3">
                <h1>Username</h1>
                <input class="rounded-xl border-2 border-zinc-200 px-2 py-1 focus:outline-none focus:ring-0"
                    type="text" name="name" id="name">
            </label>
            <label for="password" class="flex h-10 items-center justify-start gap-3">
                <h1>Password</h1>
                <input class="rounded-xl border-2 border-zinc-200 px-2 py-1 focus:outline-none focus:ring-0"
                    type="password" name="password" id="password">
            </label>
            <button
                class="font-bebas border-3 inline-block rounded-xl border-zinc-200 px-4 py-1.5 text-3xl tracking-wider text-white duration-200 hover:bg-zinc-200 hover:text-zinc-900"
                type="submit">
                Login
            </button>
            @if (!$pagelogin)
                <h1>already have an account login <a class="underline" href="http://127.0.0.1:8000/login">here</a> </h1>
            @else
                <h1> don't have an account <a class="underline" href="http://127.0.0.1:8000/sign">Sign Up</a> </h1>
            @endif
        </form>
    </div>
</x-layout>
