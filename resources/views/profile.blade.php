<x-layout>
<x-slot:title> Profile </x-slot:title>
<h1> ini adalah Profile </h1>
    <h1>nama:{{ $datauser->name }}</h1>
    <h1>email:{{ $datauser->email }}</h1>
    <h1>role:{{ $datauser->role }}</h1>
</x-layout>

