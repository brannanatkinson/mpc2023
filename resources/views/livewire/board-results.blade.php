<div>
    <div class="mt-12 max-w-6xl px-6 md:px-0 mx-auto">
        <p class="text-center text-xl mb-2">Housing Hope Has Raised</p>
        <div class="mb-2 text-6xl text-center font-bold text-mp-blue-green">${{ number_format( App\Models\Gift::all()->sum('gift_total') + App\Models\Sponsor::all()->sum('amount') + env('DONATIONS'), 0, ',' ) }}</div>
        <p class="text-center text-xl mb-8"></p>
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            <div class="flex flex-col p-8 text-center text-white bg-mp-coral rounded-lg shadow-md">
                <div class="mb-6 font-display"><i class="fa fa-star fa-2x"></i></div>
                <div class="mb-6 text-5xl font-bold">{{ App\Models\Gift::all()->count() + env('DONORS') }}</div>
                <div class="mb-4 text-xl uppercase">Donors</div>
            </div>
            <div class="flex flex-col p-8 text-center text-white bg-mp-light-lime rounded-lg shadow-md">
                <div class="mb-6 font-display"><i class="fa fa-gift fa-2x"></i></div>
                <div class="mb-6 text-5xl font-bold">{{ DB::table('gift_item')->select(DB::raw('SUM(item_quantity) as quantity'))->first()->quantity }}</div>
                <div class="mb-4 text-xl uppercase">Items Given</div>
            </div>
            <div class="flex flex-col p-8 text-center text-white bg-mp-blue-green rounded-lg shadow-md">
                <div class="mb-6 font-display"><i class="fa fa-heart fa-2x"></i></div>
                <div class="mb-6 text-5xl font-bold">${{ number_format( App\Models\Gift::all()->sum('gift_total') + env('DONATIONS') ) }}</div>
                <div class="mb-4 text-xl uppercase">
                    Donations
                </div>
            </div>
            <div class="flex flex-col p-8 text-center text-white bg-mp-navy rounded-lg shadow-md">
                <div class="mb-6 font-display"><i class="fa fa-trophy fa-2x"></i></div>
                <div class="mb-6 text-5xl font-bold">${{ number_format( App\Models\Sponsor::all()->sum('amount'), 0, ',' ) }}</div>
                <div class="mb-4 text-xl uppercase">
                    Sponsors
                </div>
            </div>
        </div>
    </div>
</div>
