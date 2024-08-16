<div>
<x-public-layout>
    <x-slot name="title">
        Thank you
    </x-slot>
    <div class="max-w-5xl mx-auto mt-12">
        <div class="mb-6 text-center text-4xl">You're a hero and a lifesaver. Literally.</div>
        <p class="mb-12 text-xl">Thank you for supporting Housing Hope. Your gift helps ensure that residents of The Mary Parrish Center and other survivors of interpersonal violence have an opportunity finally to be safe, heal from the trauma they've experienced, and rebuild their lives.</p>
        <div class="mb-12 bg-gray-100 p-8">
            <div class="mb-3 text-2xl">
                Would you like to add your name to the Giving Wall?
            </div>
            <p class="mb-6">The Giving Wall presented by Pinnacle Financial Partners is a place where we recognize the amazing donors like you. If you would like to include your name on the giving wall, please check the box below.</p>
            <input type="checkbox" class="h-8 w-8" value="0" wire:model.live="showNameOnWall" wire:click.prevent="showDonorName">
            <label class="ml-4" for="" wire:model.live="showNameOnWall">Yes, please add my name to the Giving Wall</label>
            @if( $showNameOnWall == 1 )
                <form action="" class="mt-6">
                    <label for="">The name that will appear on the Giving Wall is <i>{{ $gift->donor->full_name }}</i>. To change your name on the Giving Wall, enter a new name in the box and click the 'Update Name' button.</label>
                    <div class="mt-4">
                        <input type="text" class="w-full md:w-1/2" value="{{ $gift->donor->full_name }}" wire:model.live="donorUpdatedName">
                        <button wire:click.prevent="updateDonorName" class="md:ml-4 px-4 py-3 text-white bg-mp-blue-green">Update Name</button>
                        @if( $nameConfirmation == 1 )
                        <div class="mt-4 text-mp-blue-green">Your name has been updated.</div>
                        @endif
                    </div>
                </form>
            @endif
        </div>
        <div class="mb-12 bg-gray-100 p-8">
            <div class="mb-3 text-2xl">
                Would you like to write a note of support?
            </div>
            <p class="mb-6">The Mary Parrish Center clients would love to hear from you. Your anonymous note will also appear on the Giving Wall.</p>
            @if ( $noteConfirmation == 1 )
                <div class="mb-4 text-mp-coral text-xl">Thank you for your kind note.</div>
            @endif
            <textarea name="" id="" class="w-full mb-4" rows="5" wire:model.live="note"></textarea>
            <button wire:click.prevent="saveDonorNote" class="px-4 py-3 text-white bg-mp-blue-green">Save My Note</button>
        </div>
        @if( $gift->user_id == null)
        <div class="mb-12 bg-gray-100 p-8">
            <div class="mb-3 text-2xl">
                Would you like to credit a virtual host?
            </div>
            <p class="mb-4">We noticed you left the virtual host blank at checkout. Virtual hosts are friends of The Mary Parrish Center helping us spread the word about Housing Hope.</p>
            <p class="mb-6">You can still credit your virtual host. Please select his or her name from the list below. (Hosts listed alphabetically by first name) </p>
            <select name="" id="" wire:model.live="hostToCredit" class="mb-4">
                <option value="0">No host</option>
                @foreach( App\Models\User::permission('edit host')->orderBy('name')->get() as $host)
                <option value="{{ $host->id }}">{{ $host->name }}</option>
                @endforeach
            </select>
            @if ( $hostToCredit != 0)
            <button wire:click.prevent="creditHost" class="px-4 py-3 text-white bg-mp-blue-green">Yes, credit my host</button>
            @endif
            @if( $hostConfirmation == 1 )
            <div class="mt-2 text-mp-blue-green">Thank you for crediting your host.</div>
            @endif
        </div>
        @endif
    </div>

</x-public-layout>
</div>
