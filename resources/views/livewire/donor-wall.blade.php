<div>
    <div class="mt-12 px-6 md:px-0 py-10 bg-mp-light-lime">
        <div class="mb-16 max-w-6xl mx-auto mt-12">
            <div class="mb-3 text-4xl text-center text-mp-navy font-display">
                @php date('Y') @endphp Housing Hope Donor Roll
            </div>
            <p class="text-mp-blue-green text-center text-xl">Thanks to these Housing Hope donors who have chosen to be featured on the Donor Roll.</p>

            <div class="mt-9 grid grid-cols-1 md:grid-cols-5">
                @foreach( $donorsForWall as $donor )
                <div class="text-center py-2">
                    <spon class="text-xl font-display">{{ $donor->full_name }}</spon>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
</div>
