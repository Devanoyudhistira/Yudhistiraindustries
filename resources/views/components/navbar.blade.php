 <nav x-data="{ open: false }" class="top-0 flex h-auto w-dvw justify-between items-center flex-row bg-zinc-950 px-6 py-1 text-[23px] font-medium font-orbit tracking-widest text-zinc-200">
     <h1 class=""> 
         {{ $slot }}          
    </h1>
    <div x-on:click="open = ! open" class="flex flex-col gap-1 z-100" >
        <span class="w-8 h-1 bg-white block" ></span>
        <span class="w-8 h-1 bg-white block" ></span>
        <span class="w-8 h-1 bg-white block" ></span>
    </div>
    <div x-show="open" x-transition class="w-screen h-screen text-zinc-200 bg-black/80 fixed top-0 left-0 flex flex-col justify-center items-center" >
        <x-navitem href="/products">products</x-navitem>
        <x-navitem href="/companyblog" >news</x-navitem>
        <h2> sellers </h2>
         <x-navitem href="/profile" > profile </x-navitem>
        <x-navitem href="/logout" > Logout </x-navitem>
    </div>
 </nav>


