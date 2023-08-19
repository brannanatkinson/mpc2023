<div>

    <!-- 
    * mobile
    -->

    <div x-data="{ isOpen: false }" class="max-w-7xl mx-auto flex flex-col items-center md:flex-row py-8 bg-white">
        <div class="">
            <a href="/"><img src="{{ Storage::url('/logos/housing_hope_stacked_pinnacle.png')}}" class="w-64 md:mr-8" alt=""></a>
        </div>
        <!-- left header section -->
        <div class="flex items-center">
            <div>
                <button @click="isOpen = true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10  md:hidden" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

            </div>
            <div class="hidden space-x-6 lg:inline-block">
                <ul class="list-type-none text-mp-blue-green">
                   @if ( getCurrentPeriod() == 'during')
                    <li class="inline-block mr-8">
                        <a href="/catalog">Giving Catalog</a>
                    </li>
                    <li class="inline-block mr-8">
                        <a href="/givingwall">Giving Wall</a>
                    </li>
                    <li class="inline-block mr-8">
                        <a href="/sponsors">Sponsors</a>
                    </li> 
                    @endif
                    <li class="inline-block mr-8">
                        <a href="/about">About Housing Hope</a>
                    </li>
                    <li class="inline-block">
                        <a href="https://maryparrish.org">The Mary Parrish Center</a>
                    </li>
                </ul>
            </div>
            @if ( getCurrentPeriod() == 'during' )
            <div class="pl-24">
                <div class="snipcart-summary">
                    <a href="#" class="snipcart-checkout justify-self-end"><i class="fa-duotone fa-shopping-cart text-mp-blue-green"></i></a>
                    <span class="snipcart-total-items text-mp-coral"></span>
                    <span class="snipcart-total-price"></span>
                </div>
            </div>
            @endif
            

            <!-- mobile navbar -->
            <div class="mobile-navbar">
                <!-- navbar wrapper -->
                <div class="fixed left-0 w-full h-64 p-5 bg-white rounded-lg shadow-xl top-40 z-50" x-show="isOpen"
                    @click.away=" isOpen = false">
                    <div class="flex flex-col space-y-6">
                        @if ( getCurrentPeriod() == 'during')
                        <a href="/catalog" class="text-sm text-black">Giving Catalog</a>
                        <a href="/givingwall" class="text-sm text-black">Giving Wall</a>
                        <a href="/sponsors" class="text-sm text-black">Sponsors</a>
                        @endif
                        <a href="/about" class="text-sm text-black">About Housing Hope</a>
                        <a href="https://maryparrish.org" class="text-sm text-black">The Mary Parrish Center</a>
                    </div>
                </div>
            </div>
            <!-- end mobile navbar -->
        </div>
        <!-- right header section -->

    </div>
</div>