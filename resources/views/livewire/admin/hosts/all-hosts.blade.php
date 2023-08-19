<div class="container mx-auto">
    <div class="mb-4 text-4xl text-center">Housing Hope 2023 Hosts</div>
    <div class="mb-4 text-3xl">Create a new host</div>
    <div>
        <form wire:submit.prevent="store" class="flex items-start mb-8">
            @csrf
            <div class="mr-8">
                <input type="text" wire:model="name" class="p-4 rounded w-64"  placeholder="Name"><br>
                <label for="exampleInputPassword1">Host Name</label>
                @error('name') <div><span class="error">{{ $message }}</span></div> @enderror
            </div>
            <div class="mr-8">
                <input type="email" class="p-4 rounded w-64" placeholder="Enter email" wire:model="email"><br>
                <label>Host Email</label>
            </div>
            <div>
                <button type="submit" class="px-4 py-3 bg-mp-blue-green text-white">Submit</button>
            </div>
        </form>
    </div>
    <div class="mb-8 text-4xl text-center">Total for all Hosts – ${{ App\Models\Gift::where('user_id','!=', null)->sum('gift_total') }}</div>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
         @foreach( $hosts as $host )
            @php
                $hostId = App\Models\User::where('name', '=', $host->name)->first()->id 
            @endphp
        <div class="p-6 bg-white rounded-md shadow-lg">
            <div class="mb-6 flex justify-between">
                @if( $host->userMeta->show_total == 0)
                <i class="text-gray-200 fa fa-dollar-sign"></i>
                @else
                <i class="text-mp-blue-green fa fa-dollar-sign"></i>
                @endif

                @if( $host->userMeta->show_goal == 0)
                <i class="text-gray-200 fa fa-bullseye"></i>
                @else
                <i class="text-mp-blue-green fa fa-bullseye"></i>
                @endif

                @if( $host->userMeta->show_items == 0)
                <i class="text-gray-200 fa fa-gift"></i>
                @else
                <i class="text-mp-blue-green fa fa-gift"></i>
                @endif

                @if( $host->userMeta->show_rationale == 0)
                <i class="text-gray-200 fa fa-comment-alt-edit"></i>
                @else
                <i class="text-mp-blue-green fa fa-comment-alt-edit"></i>
                @endif
               

                

            </div>
            <h2 class="mb-6 text-3xl text-center">{{ $host->name }}</h2>
            <h3 class="mb-4 text-2xl font-bold text-center">${{ App\Models\Gift::where('user_id', '=', $hostId )->sum('gift_total') }}</h3>
            <h3 class="mb-4 text-xl text-center">{{ App\Models\Gift::where('user_id', '=', $hostId )->count() }} Gifts</h3>
            
            <div class="flex flex-row justify-between">
                <a href="/hosts/{{ $host->host_url }}" class="text-left text-mp-navy">View Public Page</a>
                <p wire:click.prevent="sendInviteEmail( {{ $host->id }} )" class="text-right text-mp-coral">Resend invite link</p>
            </div>
        </div> <!-- end card  -->
        @endforeach
    </div> <!-- end grid  -->

    <div class="mt-16">

        

    </div>
    
</div>
