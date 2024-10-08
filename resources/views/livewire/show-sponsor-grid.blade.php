<div class="max-w-6xl mx-auto">
@antlers
        <div class="container grid grid-cols-1 md:grid-cols-2 mb-8 gap-8">
            
            {{ if {collection:count in="sponsors" sponsor_type:contains="1"} > 0 }}
                <div class="md:col-span-2 md:mb-16">  
                    <div class="mb-4 text-center font-display text-3xl text-mp-blue-green">
                        Presenting Sponsor 
                    </div>
                    {{ collection:sponsors sponsor_type:contains="1" sort="order"  }}
                        <div>
                            <a href="http://{{ sponsor_website }}" target="_blank">
                                {{ logo }}
                                    <img src="{{ url }}" class="w-1/2 mx-auto" alt="">
                                {{ /logo }}
                            </a>
                        </div>
                    {{ /collection:sponsors }}
                </div>
            {{ endif }}
            {{ if {collection:count in="sponsors" sponsor_type:contains="2"} > 0 }}
                <div class=" md:mb-16">  
                    <div class="mb-4 text-center font-display text-3xl text-mp-blue-green">
                        Giving Catalog Sponsor
                    </div>
                    {{ collection:sponsors sponsor_type:contains="2" sort="title"  }}
                        <div>
                            <a href="http://{{ sponsor_website }}" target="_blank">
                                {{ logo }}
                                    <img src="{{ url }}" class="w-1/2 mx-auto" alt="">
                                {{ /logo }}
                            </a>
                        </div>
                    {{ /collection:sponsors }}
                </div>
            {{ endif }}
            {{ if {collection:count in="sponsors" sponsor_type:contains="3"} > 0 }}
                    <div>  
                        <div class="mb-4 text-center font-display text-3xl text-mp-blue-green">
                            Giving Wall Sponsor
                        </div>
                        {{ collection:sponsors sponsor_type:contains="3" sort="title"  }}
                            <a href="http://{{ sponsor_website }}" target="_blank">
                                {{ logo }}
                                    <img src="{{ url }}" class="w-1/2 mx-auto" alt="">
                                {{ /logo }}
                            </a>
                        {{ /collection:sponsors }}
                    </div>
            {{ endif }}
            {{ if {collection:count in="sponsors" sponsor_type:contains="4"} > 0 }}
                <div class="md:col-span-2 md:mb-8 md:mt-8">  
                    <div class="mb-4 text-center font-display text-3xl text-mp-blue-green">
                        Champion of Hope Sponsor
                    </div>
                    <div class="container max-w-3xl mx-auto grid mb-8">
                        <div class="flex justify-center">  
                            {{ collection:sponsors sponsor_type:contains="4" sort="title"}}
                                <a href="http://{{ sponsor_website }}" target="_blank" class="">
                                    {{ logo }}
                                        <img src="{{ url }}" class="w-1/3 mx-auto" alt="">
                                    {{ /logo }}
                                </a>
                            {{ /collection:sponsors }}
                        </div>
                    </div>
                </div>
            {{ endif }}
        </div>
 
        {{ if {collection:count in="sponsors" sponsor_type:contains="5"} > 0 }}
            <div class="mb-4 text-center font-display text-3xl text-mp-blue-green">Matching Sponsors</div>
            <div class="container grid grid-cols-1 md:grid-cols-4 mb-8 gap-8 ">
                {{ collection:sponsors sponsor_type:contains="5" sort="title"}}
                    <div class=" h-64 w-full bg-white ">  
                        <div class="flex justify-center h-full items-center mb-4">
                            {{ logo }} 
                                {{ if sponsor_website }}   
                                <a href="http://{{ sponsor_website }}">
                                    <img src="{{ url }}" class="object-contain h-64 w-64" alt="">
                                </a>
                                {{ else }}
                                    <img src="{{ url }}" class="object-contain h-64 w-64" alt="">
                                {{ endif }}
                            {{ /logo }}
                        </div>
                    </div>
                {{ /collection:sponsors }}
            </div>
        {{ endif }}

        {{ if {collection:count in="sponsors" sponsor_type:contains="6"} > 0 }}
            <div class="mb-4 text-center font-display text-2xl text-mp-coral">Advocates of Hope</div>
            <div class="container grid grid-cols-1 md:grid-cols-3 mb-8">
                {{ collection:sponsors sponsor_type:contains="6" sort="title"}}
                    <div class="text-center">
                        {{ title }}
                    </div>
                    
                {{ /collection:sponsors }}
            </div>
        {{ endif }}

        {{ if {collection:count in="sponsors" sponsor_type:contains="7"} > 0 }}
            <div class="mb-4 text-center font-display text-2xl text-mp-coral">Bearers of Hope</div>
            <div class="container grid grid-cols-1 md:grid-cols-3 mb-8">
                {{ collection:sponsors sponsor_type:contains="7" sort="title"}}
                    <div class="text-center">
                        {{ title }}
                    </div>
                    
                {{ /collection:sponsors }}
            </div>
        {{ endif }}

        {{ if {collection:count in="sponsors" sponsor_type:contains="8"} > 0 }}
            <div class="mb-4 text-center font-display text-2xl text-mp-coral">Supporters of Hope</div>
            <div class="container grid grid-cols-1 md:grid-cols-3 mb-8">
                {{ collection:sponsors sponsor_type:contains="8" sort="title"}}
                    <div class="text-center">
                        {{ title }}
                    </div>
                    
                {{ /collection:sponsors }}
            </div>
        {{ endif }}

        {{ if {collection:count in="sponsors" sponsor_type:contains="9"} > 0 }}
            <div class="mb-4 text-center font-display text-3xl text-mp-blue-green">In Kind Sponsors</div>
            <div class="container grid grid-cols-1 md:grid-cols-4 mb-8 gap-8 ">
                {{ collection:sponsors sponsor_type:contains="9" sort="order"}}
                    <div class=" h-64 w-full bg-white ">  
                        <div class="flex justify-center h-full items-center mb-4">
                            {{ logo }}    
                                <a href="http://{{ sponsor_website }}">
                                    <img src="{{ url }}" class="object-contain h-64 w-64" alt="">
                                </a>
                            {{ /logo }}
                        </div>
                    </div>
                {{ /collection:sponsors }}
            </div>
        {{ endif }}
    @endantlers
    </div>