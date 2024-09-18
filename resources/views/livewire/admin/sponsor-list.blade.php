<div>
    <div class="container mx-auto max-w-3xl">
        <div class="mt-8 flex grid grid-cols-2 gap-4">
            @foreach ( $sponsors as $sponsor )
                <div>
                    {{ $sponsor->title }}
                </div>
                <div>
                    {{ $sponsor-> amount }}
                </div>
            @endforeach
        </div>
    </div>
</div>
