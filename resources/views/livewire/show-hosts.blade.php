<ul class="flex flex-col md:flex-row flex-wrap justify-center">
    @foreach( App\Models\User::orderBy('name')->get() as $host   )
    <li class="w-full md:w-1/4 text-center text-2xl text-white">{{ $host->name}} </li>
    @endforeach
</ul>
