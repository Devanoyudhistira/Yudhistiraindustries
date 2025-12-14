<label for="productimage {{ $attributes }}">
    <div class="flex flex-col items-center justify-center gap-2">
        <i class="bi bi-images text-3xl text-zinc-800"></i>
        <h1 class="font-bebas text-xl font-semibold">{{ $slot }}  </h1>
        <h6 class="text-xl font-sans font-thin text-zinc-800" > drag or place your image here </h6>
    </div>
    <input hidden autofocus="off" accept="image/*" type="file" name="productimage" id="productimage">
</label>
