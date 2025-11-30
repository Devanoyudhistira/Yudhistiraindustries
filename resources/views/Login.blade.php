<x-layout>
    @if ($pagelogin)
        <x-slot:title> login </x-slot:title>
    @else
        <x-slot:title> Sign In </x-slot:title>
    @endif

    <div class="flex h-screen w-screen flex-col items-center justify-center gap-4 bg-zinc-950">

        @if ($errors->hasAny(['email', 'name']))
            <h1 class="font-bebas text-3xl font-medium text-red-700"> this account is already exist </h1>
        @endif

        <h1 class="font-orbit text-center text-4xl font-bold tracking-tight text-white">YudhistiraIndustries</h1>
        <form
            @if ($pagelogin) action="/loginpage" method="POST"
    @else
    action="signin"
 method="POST" @endif
            class="w-160 h-100 border-3 font-orbit grid grid-cols-1 place-content-center place-items-center gap-y-8 rounded-2xl border-zinc-300 px-3 py-1 text-center text-xl font-medium text-zinc-200">
            @csrf
            <h1 class="font-orbit -ml-2 text-2xl font-bold tracking-wider text-white"> Join Us </h1>
            @if (!$pagelogin)
                <label x-data="{ email: '' }" for="email" class="ml-15 h-10 ">
                    <div class="flex items-center justify-start gap-3">
                    <h1>Email</h1>
                    <input x-model="email"
                        class="rounded-xl border-2 border-zinc-200 px-2 py-1 focus:outline-none focus:ring-0"
                        type="email" name="email" id="email">          
                        </div>                              
                </label>
            @endif
            <label x-data="{ name: '' }" for="name" autocorrect="off" class="h-10 relative gap-3">
                <div class="flex items-center justify-start gap-3">
                <h1>Username</h1>
                <input x-model="name" class="rounded-xl border-2 border-zinc-200 px-2 py-1 focus:outline-none focus:ring-0"
                    type="text" name="name" id="name">
                </div>
                <p class="font-bebas text-xl absolute left-40 duration-100 text-red-600" x-text="textcount(name,'name cannot be less then 8 character')"></p>                    
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
                <h1>already have an account login <a class="underline" href="/login">here</a> </h1>
            @else
                <h1> don't have an account <a class="underline" href="/sign">Sign Up</a> </h1>
            @endif
        </form>
    </div>

    <script>
        function textcount(textinput,massage) {
            const textlength = textinput.length < 8 && textinput.length >= 0
            return textlength ? massage : ""
        }
    </script>
</x-layout>
