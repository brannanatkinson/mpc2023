<x-public-layout>
	<x-slot name="title">
        Giving Wall
    </x-slot>
	<div class="max-w-4xl mx-auto mb-12 flex flex-col items-center md:flex-row md:justify-center">
        <img src="{{ Storage::url('/logos/giving_wall_icon.png')}} " class="h-32 z-20" alt="">
        <img src="{{ Storage::url('/logos/giving_wall_name.png')}}" class="h-32 md:h-40 md:self-center -mt-8 md:mt-0 " alt="">
        <img src="{{ Storage::url('/logos/giving_wall_sponsor.png')}}" class="h-24 md:h-24 self-center z-10 -mt-8 md:mt-0 md:self-center" alt="">
    </div>
	</div>
	@livewire('results')
	<div class="mt-12 px-6 md:px-0 py-10 bg-mp-light-lime">
		<div class="mb-16 max-w-6xl mx-auto mt-12">
			<div class="mb-3 text-4xl text-center text-mp-navy font-display">
				@php date('Y') @endphp Housing Hope Donor Roll
			</div>
			<p class="text-mp-blue-green text-center text-xl">Thanks to these Housing Hope donors who have chosen to be featured on the Donor Roll.</p>

			<div class="mt-9 grid grid-cols-1 md:grid-cols-5">
				@foreach( App\Models\Donor::where('showNameOnWall', '=', 1)->orderBy('full_name')->get() as $donor )
				<div class="text-center py-2">
					<spon class="text-xl font-display">{{ $donor->full_name }}</spon>
				</div>
				@endforeach
			</div>
			
		</div>
	</div>
	<div class="px-6 md:px-0 py-10 bg-mp-navy">
		<div class="mb-16 max-w-6xl mx-auto mt-12">
			<div class="mb-3 text-4xl text-center text-mp-coral font-display">
				@php date('Y') @endphp Housing Donor Notes
			</div>
			<p class="text-mp-light-gray text-center text-xl">The Mary Parrish Center residents, alumni, and staff are grateful for your wonderful notes. </p>
			<div class="mt-9 box-border md:masonry before:box-inherit after:box-inherit">
				@foreach( App\Models\Donor::where('note', '!=', null)->get() as $donor )
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
	
</x-public-layout>