<div class="container mx-auto">
    <div class="mb-4 text-4xl text-center">Housing Hope Hosts</div>
    <div class="mb-4 text-3xl">Create a new host</div>
    <div>
        <form wire:submit="store" class="flex items-start mb-8">
            @csrf
            <div class="mr-8">
                <input type="text" wire:model.live="name" class="p-4 rounded w-64"  placeholder="Name"><br>
                <label for="exampleInputPassword1">Host Name</label>
                @error('name') <div><span class="error">{{ $message }}</span></div> @enderror
            </div>
            <div class="mr-8">
                <input type="email" class="p-4 rounded w-64" placeholder="Enter email" wire:model.live="email"><br>
                <label>Host Email</label>
            </div>
            <div>
                <button type="submit" class="px-4 py-3 bg-mp-blue-green text-white">Submit</button>
            </div>
        </form>
    </div>
    <!-- <div class="mb-8 text-4xl text-center">Total for all Hosts – ${{ App\Models\Gift::where('user_id','!=', null)->sum('gift_total') }}</div> -->
        <div class="resp-table">
            <div class="resp-table-header">
                <div class="table-header-cell">
                Name
                </div>
                <div class="table-header-cell">
                Invitation
                </div>
                <div class="table-header-cell">
                Campaigns
                </div>
                <div class="table-header-cell">
                @php echo date("Y") @endphp Results
                </div>
                <div class="table-header-cell">
                
                </div>
            </div>
            <div class="resp-table-body ">
                @foreach( $hosts as $host )
                @php
                    $hostId = App\Models\User::where('name', '=', $host->name)->first()->id 
                @endphp
                <div class="resp-table-row ">
                    <div class="table-body-cell">
                        <div class="text-xl -mb-6">{{ $host->name}} 
                            @if ( $host->campaigns->last()->year == date('Y'))
                                <i class="fa fa-heart text-mp-blue-green"></i>
                            @endif
                        </div> 
                        <br/>
                        {{ $host->email}}
                    </div>
                    <div class="table-body-cell">
                        @if ( $host->campaigns->last()->year != date("Y") )
                            <div wire:click.prevent="sendInviteEmail( {{ $host->id }} )" class="inline-block px-6 py-2 bg-mp-coral text-white rounded-full cursor-pointer">Send invite link</div>
                        @else
                            <div wire:click.prevent="resendInviteEmail( {{ $host->id }} )" class="inline-block px-6 py-2 bg-mp-navy text-white rounded-full cursor-pointer">Resend invite link</div>
                        @endif 
                    </div>
                    <div class="table-body-cell">
                        @foreach ( $host->campaigns as $campaign)
                            @if ( $campaign->year == date('Y'))
                                <div class="inline-block text-sm px-6 py-2 bg-mp-navy text-white rounded-full">
                                    {{ $campaign->year }}
                                </div>
                            @else
                                <div class="inline-block text-sm px-6 py-2 bg-mp-light-lime text-white rounded-full">
                                    {{ $campaign->year }}
                                </div>
                            @endif
                        @endforeach
                    </div>
                    
                    <div class="table-body-cell">
                    
                    </div>
                    <div class="table-body-cell">
                    
                    </div>
                </div>

                @endforeach
            </div>
        </div>

         

        
        
    

    <div class="mt-16">

        

    </div>
    
</div>
