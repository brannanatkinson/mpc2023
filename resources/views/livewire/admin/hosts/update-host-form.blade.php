<div>
    <div class="max-w-5xl mx-auto">
        @if( $show_alert )
        <div class="mb-8">
            <div class="p-4 bg-mp-blue-green text-white">Your profile was updated.</div>
        </div>
        @endif
        @if ( $image )
        <div class="mb-8 mx-auto h-24 w-24 rounded-full overflow-hidden">
            <img src="{{ Storage::url( $image ) }}" class="h-24 object-cover" alt="">
        </div>
        @endif
        <div class="mb-8">
            <div class="mb-4 text-3xl text-center">Profile for {{ $user->name }}</div>
            <div class="text-center">
                <a class="text-mp-coral" href="/hosts/{{ $user->host_url }}" target="_blank">View your public profile</a>
            </div>
        </div>
        <div class="mb-8">
            <p>This form will help you update your public Housing Hope profile. You can email <a href="mailto:brannan@amyacommunications.com" class="mp-blue-green underline">Brannan Atkinson</a> any time if you have any questions or issues.</p>
        </div>
        <div class="mb-12 p-8 bg-white">
            <div class="text-2xl">Add Your Photo</div>
            <div class="mb-4 flex flex-col">
                <label class="mb-4">Add a photo that will show on your public profile. Your photo must be a JPG, JPEG, or PNG that is less than 1MB in size.</label>
                @error('image') <div class="pb-4"><span class="text-red-500">{{ $message }}</span></div> @enderror
                <input type="file" wire:model="image"  >
            </div>
            <button wire:click.prevent="saveUserPhoto" class="mb-8 px-4 py-3 text-white bg-mp-blue-green">Save Your Photo</button>
            <div>
                <a wire:click.prevent="removeUserPhoto" class="w-full text-mp-coral float-right">Remove your photo</a>
            </div>
        </div>
        <div class="mt-4 mb-12 p-8 bg-white">
            <div class="text-2xl">Show Host Totals</div>
            <p class="mb-4">This will show total amount of donations where users have credited you as the virtual hosts</p>
            <input class="h-8 w-8" wire:click.prevent="saveUserShowTotal" value="{{ $show_total }}" wire:model="show_total" type="checkbox">
            <label for="">Check to show donation total</label>
        </div>
        <div class="mb-12 p-8 bg-white">
            <div class="text-2xl">Add a Goal</div>
            <p class="mb-4">Enter an amount if you would like to set a goal. Please leave blank if you don't want to set a goal.</p>
            <div class="mb-4">
                <label for="">Enter your goal amount $</label>
                <input type="number" class="border border-2 py-2 px-3 bg-gray-50" wire:model="goal"><br/>
            </div>
            @if ( $goal != null OR $goal != 0 )
            <div class="mb-4">
                <input class="h-8 w-8" type="checkbox" wire:click.prevent="saveUserShowGoal" value="{{ $show_goal }}" wire:model="show_goal">
                <label class="" for="">Check to show you goal on your public page. Your goal will remoain private if you don't check this box.</label>
            </div>
            @endif
            <button wire:click.prevent="saveUserGoal" class="px-4 py-3 text-white bg-mp-blue-green">Save Goal</button>
        </div>
        <div class="mb-12 p-8 bg-white">
            <div class="text-2xl">Show Donated Items</div>
            <p class="mb-4">This option will show users the items that people have donated when crediting you as the host.</p>
            <input class="h-8 w-8" type="checkbox" wire:click.prevent="saveUserShowItems" value="{{ $show_items }}" wire:model="show_items">
            <label for="">Check to show items</label>
        </div>
        <div class="mb-12 p-8 bg-white">
            <div class="text-2xl">Show Reason for Supporting Housing Hope</div>
            <p class="mb-4">Write a statement about why you support The Mary Parrish Center or any message you want visitiors to see.</p>
            <div class="mb-4">
                <input class="h-8 w-8" type="checkbox" wire:click.prevent="saveUserShowRationale" value="{{ $show_rationale }}" wire:model="show_rationale">
                <label for="">Show your message of support on your public page</label>
            </div>
            <textarea class="w-full border border-2 py-2 px-3 bg-gray-50" rows="7" wire:model="rationale"></textarea>
            <button wire:click.prevent="saveUserRationale" class="px-4 py-3 text-white bg-mp-blue-green">Save Message</button>
        </div>
        <div class="mb-12 p-8 bg-white">
            <div class="text-2xl">Update Your Password</div>
            <p class="mb-4">Please enter and confirm your new password. You will have to log in again following the password reset.</p>
            @error('password') <div><span class="error">{{ $message }}</span></div> @enderror
            @if( $msg_password_updated ) 
                <div>Your password has been updateed</div> 
            @else
                <div class="mb-4">
                    <label for="">New Password</label><br/>
                    <input type="password" class="border border-2 py-2 px-3 bg-gray-50" wire:model="password">
                </div>
                <div class="mb-4">
                    <label for="">Confirm Password</label><br/>
                    <input type="password" class="border border-2 py-2 px-3 bg-gray-50" wire:model="password_confirmation">
                </div>
                <button wire:click.prevent="saveNewPassword" class="px-4 py-3 text-white bg-mp-blue-green">Save Message</button>
            @endif
        </div>
    </div>
    
</div>
