<div>
    <div class="px-6 md:px-0 py-10 bg-mp-navy">
        <div class="mb-16 max-w-6xl mx-auto mt-12">
            <div class="mb-3 text-4xl text-center text-mp-coral font-display">
                @php echo date('Y') @endphp Housing Donor Notes
            </div>
            <p class="text-mp-light-gray text-center text-xl">The Mary Parrish Center residents, alumni, and staff are grateful for your wonderful notes. </p>
            <div class="mt-9 box-border md:masonry before:box-inherit after:box-inherit">
                @foreach( $donorsWithNotes as $donor )
                    @if( $donor->first() )
                        <div class="flex flex-col items-center px-8 py-6 mb-4 bg-gray-200 rounded-lg break-inside">
                            <div clsss="mb-8 text-center">
                                <i class="fad fa-envelope-open fa-2x text-mp-coral"></i>
                            </div>
                            <div class="mt-3">
                                <p class="font-display italic leading-loose">{{ $donor->note }}</p>
                            </div>
                            
                        </div>
                    @else
                        <div class="px-8 py-6 my-4 bg-gray-200 rounded-lg break-inside">
                          <p>{{ $donor->note }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
