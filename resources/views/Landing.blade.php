<x-layout>
    <x-slot:title> Welcome </x-slot:title>

    <nav class="z-100 h-22 justify-aroundsa fixed -top-10 left-0 flex w-screen flex-row items-center bg-zinc-900">
        <h1 class="font-orbit absolute left-2 top-7 mt-4 self-center text-2xl font-bold tracking-tight text-amber-100">
            YudhistiraIndustry</h1>
        <a href="http://127.0.0.1:8000/logout"><button
                class="font-orbit absolute right-6 top-12 text-2xl font-thin text-zinc-100">
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
        <h1
            class="font-michroma absolute left-0 top-[34%] text-6xl font-black text-sky-100 md:text-7xl lg:text-8xl xl:text-9xl">
            Shape The <p> Earth Future
            </p>
        </h1>
    </div>
    <main>
        <article
            class="bg-linear-to-t flex h-auto w-dvw flex-col items-center justify-center gap-2 from-gray-950 to-blue-950 px-3 py-4 lg:flex-row lg:gap-20">
            <div>
                <div class="-mt-3 flex h-auto w-auto flex-col">
                    <h1 class="font-zalando ml-3 text-2xl font-bold text-zinc-200">
                        About Us
                    </h1>
                    <img src={{ asset('image/image1.jpg') }} class="w-65 h-2/6 rounded-l object-cover object-center"
                        alt="robot">
                </div>
            </div>
            <div class="lg:w-134 w-110 mt-4.5 h-auto rounded-xl bg-zinc-100 px-2">
                <p class="font-bebas text-[15px] font-light lg:text-[20px]">Lorem ipsum dolor sit amet consectetur
                    adipisicing elit.
                    Inventore eius, doloremque sunt fugit minus quia praesentium enim fugiat hic, voluptates vitae, non
                    minima ipsam repellendus? Assumenda totam minus quas quod atque molestias provident architecto vero
                    voluptates inventore illo temporibus sapiente fugiat, ipsa fuga ad eveniet non nam dicta vel saepe!.
                </p>
            </div>
        </article>
        <div id="Sponsors" class="h-95 mt-5 flex w-screen flex-col items-center justify-between bg-gray-950 py-2">
            <h1 class="font-orbit mt-6 text-4xl font-bold tracking-wider text-gray-100"> Sponsors </h1>
            <div id="card-container"
                class="-ml-10 grid h-full w-[90%] grid-cols-2 grid-rows-3 place-content-center place-items-center gap-x-3 lg:ml-0 lg:grid-cols-3 lg:grid-rows-2">
                <div id="card" class="sponsors mt-10">
                    <img class="object-cover object-center" src={{ asset('image/sponsors1.png') }} alt="formula1">
                </div>
                <div id="card" class="sponsors">
                    <img class="-mt-6 object-cover object-center lg:-mt-12" src={{ asset('image/sponsors2.png') }}
                        alt="redbull">
                </div>
                <div id="card" class="ml-25 w-15 lg:w-35 -mt-3 mr-10 h-10 lg:h-20">
                    <img class="object-cover object-center" src={{ asset('image/sponsors3.png') }} alt="mercedes">
                </div>
                <div id="card" class="ml-25 h-15 lg:w-35 w-20 lg:h-20">
                    <img class="object-cover object-center" src={{ asset('image/sponsors4.png') }} alt="steam">
                </div>
            </div>
        </div>
        <div id="product"
            class="bg-linear-to-b grid w-screen place-content-center place-items-center gap-6 from-gray-950 to-blue-950 px-4 py-6 grid-cols-2 lg:grid-cols-3">

            <h1 class="font-orbit col-span-full text-4xl font-bold text-white">
                Our Creation
            </h1>

            @for ($i = 0; $i < 3; $i++)
                <div class="flex w-full max-w-xs flex-col gap-4 bg-zinc-100 px-4 py-5">
                    <h1 class="font-michroma font-medium text-zinc-900">
                        Environment Friendly Energy Resources
                    </h1>

                    <div class="h-40 w-full overflow-hidden">
                        <img src="{{ asset('image/image2.jpg') }}" class="h-full w-full object-cover" alt="">
                    </div>

                    <p class="font-bebas text-zinc-900">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Vel voluptas maxime tenetur.
                    </p>
                </div>
            @endfor
        </div>

        <div id="socials"
            class="grid h-40 w-screen grid-cols-3 place-content-center place-items-center gap-x-5 gap-y-10 bg-gray-950">
            <h1 class="font-orbit col-span-3 text-4xl lg:text-6xl font-medium text-zinc-100"> Follow Us </h1>
            <a href="https://www.facebook.com/devano.yudhistira.1">
                <i class="bi bi-facebook text-2xl lg:text-4xl text-zinc-100"></i>
            </a>
            <a href="https://www.instagram.com/devano15.08/?next=%2F">
                <i class="bi bi-instagram text-2xl lg:text-4xl text-zinc-100"></i>
            </a>
            <a href="https://github.com/Devanoyudhistira">
                <i class="bi bi-github text-2xl lg:text-4xl text-zinc-100"></i>
            </a>
        </div>

        <footer class="flex flex-col lg:flex-row h-60 w-screen items-center justify-around bg-white">
            <p class="font-bebas w-120 ml-3 lg:-ml-52 pt-10 text-[18px] lg:text-[25px] font-normal">
                yudhistira industry is a fiction company built to fill my portfolio,i do not own any image in this
                website. And if there is a same name or product from this website i deeply sorry
            </p>

            <div class="w-90 font-bebas border-t-2 border-t-black lg:border-0 -ml-8 lg:-mr-50 text-[18px] lg:text-xl">
                <i class="bi bi-envelope"></i> <a href="devanotira@gmail.com"> devanotira@gmail.com </a>
                <div class="flex gap-2">
                    <i class="bi bi-geo-alt"></i>
                    <div class="text-justify">
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
    <script></script>


</x-layout>
