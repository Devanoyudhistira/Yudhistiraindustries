<x-layout>
    <x-slot:title>Sign in</x-slot:title>

    <div class="flex h-screen w-screen flex-col items-center justify-center gap-4 bg-zinc-950">

        @if ($errors->hasAny(['email', 'name', 'password']))
            <h1 class="font-bebas absolute text-3xl font-medium text-red-700"> please follow the instruction </h1>
        @endif


        <h1 class="font-orbit text-center text-4xl font-bold tracking-tight text-white">YudhistiraIndustries</h1>
        <form enctype="multipart/form-data" action="signin" method="POST"
            class="w-160 h-120 border-3 font-orbit gap-y-6.5 grid grid-cols-1 place-content-center place-items-center rounded-2xl border-zinc-300 px-3 py-1 text-center text-xl font-medium text-zinc-200">
            @csrf
            <h1 class="font-orbit -ml-2 text-2xl font-bold tracking-wider text-white"> Join Us </h1>
            <label x-data="{ email: '' }" for="email" class="ml-15 h-10">
                <div class="flex items-center justify-start gap-3">
                    <h1>Email</h1>
                    <input x-model="email" class="input" type="email" name="email" id="email">
                </div>
            </label>
            <label x-data="{ name: '' }" for="name" autofill="off" class="relative h-10 gap-3">
                <div class="flex items-center justify-start gap-3">
                    <h1>Username</h1>
                    <input x-model="name" class="input" type="text" name="name" id="name">
                </div>
                <p class="font-bebas absolute left-40 text-xl text-red-600 duration-100"
                    x-text="textcount(name,'name cannot be less then 8 character')"></p>
            </label>
            <label x-data="{ password: '' }" for="password" class="relative flex h-10 items-center justify-start gap-3">
                <div class="flex items-center justify-start gap-3">
                    <h1>Password</h1>
                    <input class="input" x-model="password" type="password" name="password" id="password">
                </div>
                <p class="font-bebas left-27 w-100 absolute top-10 text-xl text-red-600 duration-100"
                    x-text="textcount(password,'password cannot be less then 8 character')"></p>
            </label>
            <div class="flex ml-5 h-16 w-150 justify-center mt-3 items-center px-2 py-1 border-2 border-zinc-200 rounded-xl font-zalando gap-2" >
                <label class="text-red-600 block w-max font-semibold" for="image">Select Image</label>
                <input type="file" name="profileimage" id="image">
            </div>           
            <button
                class="font-bebas border-3 inline-block rounded-xl border-zinc-200 px-4 py-1.5 text-3xl tracking-wider text-white duration-200 hover:bg-zinc-200 hover:text-zinc-900"
                type="submit">
                Sign In
            </button>
            <h1>already have an account login <a class="underline" href="/login">here</a> </h1>
        </form>
    </div>

    <script>
        function textcount(textinput, massage) {
            const textlength = textinput.length < 8 && textinput.length >= 0
            return textlength ? massage : ""
        }
    </script>

</x-layout>
