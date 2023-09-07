<div>
    <div class="max-w-6xl grid md:grid-cols-3 lg:grid-col4 gap-8 px-0 sm:px-6">
        @foreach ( $hosts as $host )
            <div class="text-center font-display text-xl text-white">
                {{ $host->name }}
            </div>
        @endforeach
    </div>
</div>
