<div>
    <x-slot name="title">
        Board Dashboard
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Housing Hope 2023 Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="text-center text-4xl font-display text-mp-blue-green">
            @php echo date("Y") @endphp Housing Hope Results
        </div>
    </div>
    
    <div class="max-w-5xl mx-auto">
        @livewire('results')
    </div>
    <div class="mt-8 max-w-5xl mx-auto">
        <div class="my-3 text-3xl font-bold">
            @php echo date("Y") @endphp Host Summary
        </div>
        <div class="grid grid-cols-3 gap-8 mb-10">
            <div class="p-8 text-center bg-gray-200 rounded-md flex flex-col justify-center items-center">
                <div class="mb-6 uppercase">
                    Total Raised by Hosts
                </div>
                <div class="mb-8 text-4xl font-bold">
                    ${{ App\Models\Gift::where('user_id','!=', null)->where('created_at', '>', '2023-01-01')->sum('gift_total') }}
                </div>
             </div>
             <div class="p-8 text-center bg-gray-200 rounded-md flex flex-col justify-center items-center">
                <div class="mb-6 uppercase">
                    Total Gifts by Hosts
                </div>
                <div class="mb-8 text-4xl font-bold">
                    {{ App\Models\Gift::where('user_id','!=', null)->where('created_at', '>', '2023-01-01')->count() }}
                </div>
             </div>
            <div><!-- blank  --></div>
        </div>
        <div class="mt-8 grid grid-cols-5 gap-4">
            <div class=" col-span-2 font-bold">Host Name</div>
            <div class=" font-bold">Amount Raised</div>
            <div class=" font-bold">Total Gifts</div>
            <div class=" font-bold">Total Items</div>
            @foreach( $hosts as $host )
            <div class=" col-span-2">{{ $host->name }}</div>
            <div class="">${{ App\Models\Gift::where('user_id', '=', $host->id )->where('created_at', '>', '2023-01-01')->sum('gift_total') }}</div>
            <div class="">{{ App\Models\Gift::where('user_id', '=', $host->id )->where('created_at', '>', '2023-01-01')->count() }}</div>
            <div class="">{{ $host->items->sum('pivot.item_quantity') }}</div>
            @endforeach
        </div>
    </div>
    <!-- <div class="mt-10 max-w-5xl mx-auto">
        <div class="my-3 text-3xl font-bold">
            @php echo date("Y") @endphp Giving Catalog Item Summary
        </div>
        <div class="py-16">
            
        </div>
    </div> -->
        
    <div class="pb-16 mt-12 max-w-5xl mx-auto">
        <div class="mt-8 mb-6 text-3xl font-bold">
            @php echo date("Y") @endphp Gift Summary
        </div>
        <div class="grid grid-cols-5 gap-4">
            <div class=" col-span-2 font-bold">Donor</div>
            <div class=" font-bold">Amount</div>
            <div class=" font-bold">Credited Host</div>
            <!-- add purchase date  -->
            <div class=""></div>
            @foreach( App\Models\Gift::orderBy('gift_total', 'DESC')->where('created_at', '>', '2023-01-01')->get() as $gift )
            <div class=" col-span-2">{{ $gift->donor->full_name }}</div>
            <div class="">${{ $gift->gift_total }}</div>
            <div class="">
                @if ( $gift->user_id != null )
                    {{ App\Models\User::where('id' , '=', $gift->user_id )->first()->name }}
                @endif
            </div>
            <div class=""></div>
            @endforeach
        </div>
    </div>
</div>
