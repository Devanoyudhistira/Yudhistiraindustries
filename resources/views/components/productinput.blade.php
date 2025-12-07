<label for={{ $inputtype }} autofocus="true" class="font-bebas flex flex-col text-xl">
    <h1> {{ $inputitle }} </h1>
    <input autocapitalize="off" autocomplete="off"
        class="focus:none w-[50%] font-zalando rounded-xl border-2 border-black py-2 pl-2" type="text"
        name={{ $inputtype }} id={{ $inputtype }}>
</label>
