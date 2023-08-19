<div>
    <div class="max-w-6xl px-6 md:px-0 mx-auto">
        <p class="text-center text-xl mb-2">Thank you for helping us raise</p>
        <div class="mb-2 text-6xl text-center font-bold text-mp-blue-green">${{ number_format( $sponsor_total + $gift_total + $donation_total, 0, ',' ) }}</div>
        <p class="text-center text-xl mb-8">to support the survivors of interpersonal violence</p>
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            <div class="flex flex-col p-8 text-center text-white bg-mp-coral rounded-lg shadow-md">
                <div class="mb-6 font-display"><i class="fa fa-star fa-2x"></i></div>
                <div class="mb-6 text-5xl font-bold">{{ App\Models\Gift::all()->count() + $outside_donors }}</div>
                <div class="mb-4 text-xl uppercase">Donors</div>
            </div>
            <div class="flex flex-col p-8 text-center text-white bg-mp-light-lime rounded-lg shadow-md">
                <div class="mb-6 font-display"><i class="fa fa-gift fa-2x"></i></div>
                <div class="mb-6 text-5xl font-bold">{{ DB::table('gift_item')->select(DB::raw('SUM(item_quantity) as quantity'))->first()->quantity }}</div>
                <div class="mb-4 text-xl uppercase">Items Given</div>
            </div>
            <div class="flex flex-col p-8 text-center text-white bg-mp-blue-green rounded-lg shadow-md">
                <div class="mb-6 font-display"><i class="fa fa-heart fa-2x"></i></div>
                <div class="mb-6 text-5xl font-bold">${{ number_format( $gift_total + $donation_total ) }}</div>
                <div class="mb-4 text-xl uppercase">
                    Donations
                </div>
            </div>
            <div class="flex flex-col p-8 text-center text-white bg-mp-navy rounded-lg shadow-md">
                <div class="mb-6 font-display"><i class="fa fa-trophy fa-2x"></i></div>
                <div class="mb-6 text-5xl font-bold">${{ number_format( $sponsor_total, 0, ',' ) }}</div>
                <div class="mb-4 text-xl uppercase">
                    Sponsors
                </div>
            </div>
        </div>
        <div class="mt-12 text-center">
            @if ( getCurrentPeriod() == 'during' )
            <a href="/catalog" class="mx-auto px-4 py-4 text-mp-blue-green border border-mp-blue-green border-2 rounded-full hover:bg-mp-light-lime hover:text-black hover:border-white">Shop the Giving Catalog</a>
            @endif
        </div>
    </div>
</div>
