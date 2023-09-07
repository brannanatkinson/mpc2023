<div>
    <x-slot name="title">
        Board Dashboard
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Housing Hope 2023 Dashboard') }}
        </h2>
    </x-slot>
    
    @livewire('board-results')
    <div class="mt-8 max-w-6xl mx-auto">
        <div class="my-3 text-3xl font-bold">
            2022 Host Summary
        </div>
        <div class="grid grid-cols-3 gap-8 mb-10">
            <div class="p-8 text-center bg-gray-200 rounded-md flex flex-col justify-center items-center">
                <div class="mb-6 uppercase">
                    Total Raised by Hosts
                </div>
                <div class="mb-8 text-4xl font-bold">
                    ${{ App\Models\Gift::where('user_id','!=', null)->sum('gift_total') }}
                </div>
             </div>
             <div class="p-8 text-center bg-gray-200 rounded-md flex flex-col justify-center items-center">
                <div class="mb-6 uppercase">
                    Total Gifts Credited To Hosts
                </div>
                <div class="mb-8 text-4xl font-bold">
                    {{ App\Models\Gift::where('user_id','!=', null)->count() }}
                </div>
             </div>
            <div><!-- blank  --></div>
        </div>
        <div class="mt-8 grid grid-cols-5 gap-4">
            <div class=" col-span-2 font-bold">Host Name</div>
            <div class=" font-bold">Amount Raised</div>
            <div class=" font-bold">Total Gifts</div>
            <div class=" font-bold">Total Items</div>
            @foreach( App\Models\User::permission('edit host')->orderBy('name')->get() as $host )
            <div class=" col-span-2">{{ $host->name }}</div>
            <div class="">${{ App\Models\Gift::where('user_id', '=', $host->id )->sum('gift_total') }}</div>
            <div class="">{{ App\Models\Gift::where('user_id', '=', $host->id )->count() }}</div>
            <div class="">{{ $host->items->sum('pivot.item_quantity') }}</div>
            @endforeach
        </div>
    </div>
    <div class="mt-10 max-w-6xl mx-auto">
        <div class="my-3 text-3xl font-bold">
            2022 Giving Catalog Item Summary
        </div>
        <div class="mb-6 grid grid-cols-1 md:grid-cols-4 gap-6 px-6 md:py-0">
            @foreach ( $gift_items as $item )
                <div class="bg-white text-center flex flex-col rounded-md overflow-hidden">
                    <div class="mb-6 w-full">
                        <img src="{{ Storage::url( App\Models\Item::find( $item->id )->img ) }}" alt="" class="object-fit">
                    </div>
                    <div class="mb-4 text-3xl">
                        @if ( $item->id != null )
                            {{ App\Models\Item::where('statamic_id', $item->id)->first()->sales()->count() > 0 ? App\Models\Item::where('statamic_id', $item->id)->first()->sales()->first()->quantity : 0 }}
                        @endif
                    </div>
                    <div class="mb-8 text-sm">
                        @if ( count( $item->item_sponsor ) )
                            {{ $item->item_sponsor[0]['title'] }}
                        @endif
                        <br>
                    </div>
                </div>
                
            @endforeach
        </div>
    </div>
    <div class="pb-16 max-w-6xl mx-auto">
        <div class="mt-8 mb-6 text-3xl font-bold">
            2021 Gift Summary
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
