<x-layout>
    <x-slot:title> Welcome </x-slot:title>
    
    <nav class="z-100 h-22 fixed bg-zinc-900 -top-10 left-0 flex w-screen flex-row justify-aroundsa items-center">
        <h1 class="font-orbit absolute left-2 top-7 mt-4 self-center text-2xl font-bold tracking-tight text-amber-100"> YudhistiraIndustry</h1>
       <a href="http://127.0.0.1:8000/logout"><button  class="font-orbit absolute right-6 top-12 text-2xl font-thin text-zinc-100">
        @if ($login)            
        logout
        @else
        login
        @endif
        
    </button>
    </a>
    </nav>
    <div class="relative">
        <img src={{ asset('image/earth1.jpg') }} class="h-screen w-screen object-cover object-center" alt="earthcover">
        <h1 class="font-michroma absolute left-0 top-[34%] text-9xl font-black text-sky-100"> Shape The <p> Earth Future
            </p>
        </h1>
    </div>
    <main>
        <article
            class="bg-linear-to-t flex h-auto w-dvw flex-row items-center justify-center gap-20 from-gray-950 to-blue-950 py-4">
            <div>
                <div class="-mt-3 flex h-auto w-auto flex-col">
                    <h1 class="font-zalando ml-3 text-2xl font-bold text-zinc-200">
                        About Us
                    </h1>
                    <img src={{ asset('image/image1.jpg') }} class="w-65 h-2/6 rounded-l object-cover object-center"
                        alt="robot">
                </div>
            </div>
            <div class="w-134 mt-4.5 h-auto rounded-xl bg-zinc-100 px-2">
                <p class="font-bebas text-[20px] font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Inventore eius, doloremque sunt fugit minus quia praesentium enim fugiat hic, voluptates vitae, non
                    minima ipsam repellendus? Assumenda totam minus quas quod atque molestias provident architecto vero
                    voluptates inventore illo temporibus sapiente fugiat, ipsa fuga ad eveniet non nam dicta vel saepe!.
                </p>
            </div>
        </article>
        <div id="Sponsors" class="h-95 flex w-screen mt-5 flex-col items-center justify-between bg-gray-950 py-2">
            <h1 class="font-orbit text-4xl font-bold tracking-wider mt-6 text-gray-100"> Sponsors </h1>
            <div id="card-container" class="mt-6 grid h-full w-[90%] grid-cols-3 grid-rows-2 gap-x-3">
                <div id="card" class="ml-25 w-50 mt-9 h-20">
                    <img class="object-cover object-center" src={{ asset('image/sponsors1.png') }} alt="formula1">
                </div>
                <div id="card" class="ml-25 w-50 -mt-9 h-20">
                    <img class="object-cover object-center" src={{ asset('image/sponsors2.png') }} alt="redbull">
                </div>
                <div id="card" class="ml-25 w-35 -mt-3 mr-10 h-20">
                    <img class="object-cover object-center" src={{ asset('image/sponsors3.png') }} alt="mercedes">
                </div>
                <div id="card" class="ml-25 w-35 h-20">
                    <img class="object-cover object-center" src={{ asset('image/sponsors4.png') }} alt="steam">
                </div>
            </div>
        </div>
        <div x-intersect="console.log(seen)" id="product"
            class="bg-linear-to-b grid h-auto w-screen grid-cols-3 place-content-center place-items-center gap-3 from-gray-950 to-blue-950 px-4 py-6">

            <h1 class="font-orbit col-span-3 text-4xl font-bold text-white">Our Creation</h1>

            @for ($i = 0; $i < 3; $i++)
                <div id="creation" class="flex h-80 w-64 flex-col items-center justify-around bg-zinc-100 px-3 py-2">
                    <h1 class="font-michroma -mt-5 font-medium tracking-tight text-zinc-900"> Environtment Friendly
                        Energy Resources </h1>
                    <div class="-mt-8.5 h-[38%] w-[98%]"> <img src="{{ asset('image/image2.jpg') }}" alt="">
                    </div>
                    <div class="-mt-1">
                        <p class="font-bebas font-medium text-zinc-900">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Vel voluptas maxime tenetur. Et excepturi, placeat, </p>
                    </div>
                </div>
            @endfor
        </div>

        <div id="socials"
            class="grid h-40 w-screen grid-cols-3 place-content-center place-items-center gap-x-5 gap-y-10 bg-gray-950">
            <h1 class="font-orbit col-span-3 text-6xl font-medium text-zinc-100"> Follow Us </h1>
            <a href="https://www.facebook.com/devano.yudhistira.1">
                <i class="bi bi-facebook text-4xl text-zinc-100"></i>
            </a>
            <a href="https://www.instagram.com/devano15.08/?next=%2F">
                <i class="bi bi-instagram text-4xl text-zinc-100"></i>
            </a>
            <a href="https://github.com/Devanoyudhistira">
                <i class="bi bi-github text-4xl text-zinc-100"></i>
            </a>
        </div>

        <footer class="flex h-60 w-screen items-center justify-around bg-white">
            <p class="font-bebas w-120 pt-10 -ml-52 text-[25px] font-normal">                
                yudhistira industry is a fiction company built to fill my portfolio,i do not own any image in this website. And if there is a same name or product from this website i deeply sorry
            </p>

            <div class="w-90 font-bebas -mr-50 text-xl ">
                <i class="bi bi-envelope"></i> <a href="devanotira@gmail.com"> devanotira@gmail.com </a>
                <div class="flex gap-2" >
                    <i class="bi bi-geo-alt"></i>
                    <div class="text-justify" >
                        Devano Yudhistira, CEO
                        Yudhistira Industries
                        Devano Tower, Suite 5200
                        1939 Kane Street
                        Gotham, NY 10285
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <script>

    </script>


</x-layout>
