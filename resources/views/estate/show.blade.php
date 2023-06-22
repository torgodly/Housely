<x-public-layout>
    <div class="max-w-6xl mx-auto  pt-10 space-y-2">
        <h1 class="text-2xl font-bold pl-2">{{$estate->title}}</h1>
        <div class="flex justify-between items-center">
            <div class="flex justify-start items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                     class="w-3.5 h-3.5 mr-1.5">
                    <path fill-rule="evenodd"
                          d="m15.1 1.58-4.13 8.88-9.86 1.27a1 1 0 0 0-.54 1.74l7.3 6.57-1.97 9.85a1 1 0 0 0 1.48 1.06l8.62-5 8.63 5a1 1 0 0 0 1.48-1.06l-1.97-9.85 7.3-6.57a1 1 0 0 0-.55-1.73l-9.86-1.28-4.12-8.88a1 1 0 0 0-1.82 0z"
                          class="rb-zeplin-selected"></path>
                </svg>
                <span class="text-sm font-bold">4.53</span>
                <span class="text-base font-bold">·</span>
                <span class="text-sm font-bold underline">22 views</span>
                <span class="text-base font-bold">·</span>
                <span
                    class="text-sm font-bold underline">{{$estate->city}}, {{$estate->country}}, {{$estate->address}}</span>
            </div>
            <div class="flex justify-start items-center gap-2">
                <div class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="1"
                         stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 9h-1a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-8a2 2 0 0 0 -2 -2h-1"></path>
                        <path d="M12 14v-11"></path>
                        <path d="M9 6l3 -3l3 3"></path>
                    </svg>
                    <span class="text-sm font-bold underline">{{__('Share')}}</span>
                </div>
                <div class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="1"
                         stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
                    </svg>
                    <span class="text-sm font-bold underline">{{__('Share')}}</span>
                </div>
            </div>
        </div>
        <div class="!mt-6 grid grid-rows-2 grid-cols-4  rounded-xl overflow-clip  gap-2 relative" id="images">
            @foreach($estate->images->take(5) as $image)
                <img src="{{asset('storage/estates/'.$image->path)}}" alt=""
                     class="w-full h-full object-cover shadow-md">
            @endforeach
            <div
                class="absolute bottom-10 bg-white border rounded-xl border-black right-10 flex justify-center items-center gap-2 px-4 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid-dots" width="16px"
                     height="16px" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                    <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                    <path d="M19 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                    <path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                    <path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                    <path d="M5 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                    <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                    <path d="M19 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                </svg>
                <p class="text-sm font-bold">Show all photos</p>
            </div>
        </div>
        <div class="flex justify-between  !mt-12 gap-14  ">


            <div class="w-3/4">
                <div class="space-y-2">

                    <div class=" flex justify-between items-center gap-10">
                        {{--                        TODO: add company name--}}
                        <h1 class="text-2xl font-bold normal-case">Entire {{$estate->type}} for sale
                            by {{$estate->company}}</h1>
                        <img class="w-14 h-14 rounded-full"
                             src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Rounded avatar">
                    </div>
                    <div class="flex flex-wrap gap-5 items-center">
                        <div
                            class="px-6 py-3 border border-black rounded-xl flex justify-center items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bed"
                                 width="24" height="24" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 7v11m0 -4h18m0 4v-8a2 2 0 0 0 -2 -2h-8v6"></path>
                                <path d="M7 10m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                            </svg>
                            <span class="text-base font-bold capitalize">3 bedrooms</span>
                        </div>
                        <div
                            class="px-6 py-3 border border-black rounded-xl flex justify-center items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true"
                                 role="presentation" focusable="false"
                                 style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                                <path
                                    d="M7 1a3 3 0 0 0-3 2.82V31h2V4a1 1 0 0 1 .88-1H18a1 1 0 0 1 1 .88V5h-5a1 1 0 0 0-1 .88V9h-3v2h19V9h-2V6a1 1 0 0 0-.88-1H21V4a3 3 0 0 0-2.82-3H7zm13 28a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm5 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-10 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm5-4a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm5 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-10 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm5-4a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm5 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-10 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm5-4a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm5 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-10 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm5-4a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-5 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm10 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM15 7h10v2H15V7z"></path>
                            </svg>
                            <span class="text-base font-bold capitalize">3 Bathrooms</span>
                        </div>
                        <div
                            class="px-6 py-3 border border-black rounded-xl flex justify-center items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true"
                                 role="presentation" focusable="false"
                                 style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                                <path
                                    d="M26 19a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM7 18a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm20.7-5 .41 1.12A4.97 4.97 0 0 1 30 18v9a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-2H8v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-9c0-1.57.75-2.96 1.89-3.88L4.3 13H2v-2h3v.15L6.82 6.3A2 2 0 0 1 8.69 5h14.62c.83 0 1.58.52 1.87 1.3L27 11.15V11h3v2h-2.3zM6 25H4v2h2v-2zm22 0h-2v2h2v-2zm0-2v-5a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v5h24zm-3-10h.56L23.3 7H8.69l-2.25 6H25zm-15 7h12v-2H10v2z"></path>
                            </svg>
                            <span class="text-base font-bold capitalize">1 Garage</span>
                        </div>
                    </div>


                </div>
                <div class="relative my-4">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                </div>
                <div class="mt-8">
                    <h1 class="text-2xl font-bold">About this space</h1>
                    <p class="text-base font-light text-black mt-4 line-clamp-5">
                        {{$estate->description}}
                    </p>
                    <div class="mt-4 flex items-center cursor-pointer">
                        <h1 class="text-base font-bold underline ">
                            {{__('Show more')}}
                        </h1>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                             width="22" height="22" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 6l6 6l-6 6"></path>
                        </svg>
                    </div>
                </div>
                <div class="relative my-4">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                </div>

                <div class="mt-8 w-fit">
                    <h1 class="text-2xl font-bold">What this place offers</h1>
                    <div class="grid grid-cols-2 grid-rows-3 mt-4 ml-1 gap-4">
                        @foreach($estate->utilities->take(6) as $utility)
                            <div class="flex justify-start items-center gap-4">
                                <span class="text-[18px] font-thin text-black capitalize">{{$utility->name}}</span>
                                <span class="text-base text-gray-800 lowercase">x {{$utility->quantity}}</span>
                            </div>
                        @endforeach
                    </div>
                    <x-secondary-button class="mt-6 rounded-xl !px-6 py-3 capitalize !text-sm !font-bold !border-black">
                        {{__('Show all '.$estate->utilities->count().' utilities')}}
                    </x-secondary-button>
                </div>
            </div>
            <div id="card" class="flex flex-col items-center gap-6 w-1/2">
                <div class="sticky  top-32 flex flex-col items-center gap-6">
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow  p-6 flex flex-col justify-center text-center drop-shadow-xl">
                        <div class="flex justify-between items-baseline gap-32">
                            <h1 id="sss" class="text-2xl font-bold ">${{number_format($estate->price)}}</h1>
                            <h1 class="text-base font-bold underline text-gray-500">2 reviews</h1>
                        </div>
                        {{--   TODO: add gusts              --}}

                        <div>
                            <x-input-label for="offer" :value="__('Place An Offer')"/>
                            <x-text-input id="offer" name="offer" type="text" class="mt-1 block w-full"
                                          autocomplete="offer"
                                          :value="1500"/>
                        </div>
                        <div class="flex flex-col gap-3 justify-center items-center">
                            <x-primary-button
                                class="w-full flex justify-center mt-4 h-12 capitalize !text-base !font-bold">
                                {{--                     TODO: there are diffrce between buy and rent--}}
                                {{__('Purchase')}}
                            </x-primary-button>
                            <h1 class="font-thin text-sm text-gray-500">
                                You won't be charged yet
                            </h1>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex justify-between items-baseline gap-32 mt-4">
                                <h1 class="font-thin text-base text-gray-500 underline underline-offset-1 decoration-1">
                                    {{__('Estate Price')}}</h1>
                                <h1  class="font-thin text-base text-gray-500">${{number_format($estate->price)}}</h1>
                            </div>
                            <div class="flex justify-between items-baseline gap-32 mt-4">
                                <h1 class="font-thin text-base text-gray-500 underline underline-offset-1 decoration-1">
                                    {{$estate->discount}}% discount</h1>
                                <h1 class="font-thin text-base text-green-500">-${{ number_format($estate->price * ($estate->discount / 100)) }}</h1>
                            </div>
                            <div class="flex justify-between items-baseline gap-32 mt-4">
                                <h1 class="font-thin text-base text-gray-500 underline underline-offset-1 decoration-1">
                                    {{$estate->commission}}% commission</h1>
                                <h1 class="font-thin text-base text-gray-500">${{ number_format(($estate->price * $estate->commission) / 100) }}</h1>
                            </div>
                            <div class="relative my-4">
                                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                    <div class="w-full border-t border-gray-300"></div>
                                </div>
                            </div>
                            <div class="flex justify-between items-baseline gap-32 mt-4">
                                <h1 class="font-semibold text-lg text-black">Total Price</h1>
                                <h1 class="font-bold text-lg text-black">${{ number_format($estate->price - ($estate->price * $estate->discount / 100),) }}</h1>
                            </div>

                        </div>
                    </div>
                    <div class="flex justify-center items-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true"
                             role="presentation"
                             class="w-4 h-4 fill-gray-500"
                             focusable="false">
                            <path
                                d="M28 6H17V4a2 2 0 0 0-2-2H3v28h2V18h10v2a2 2 0 0 0 2 2h11.12a1 1 0 0 0 .84-1.28L27.04 14l1.92-6.72A1 1 0 0 0 28 6z"></path>
                        </svg>
                        <h1 class="text-base font-bold underline text-gray-500">Report this listing</h1>

                    </div>
                </div>
            </div>

        </div>
        <div class="relative !my-6">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-300"></div>
            </div>
        </div>
        <div class="rounded-xl overflow-clip !mt-12" wire:ignore>
            <div id="map" style="width:100%; height:400px;"></div>
        </div>
        <div class="relative !my-6">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-300"></div>
            </div>
        </div>
        <x-footer></x-footer>

        //pop up model div
        <div
    </div>
    <style>
        #images > :first-child {

            grid-row: span 2;
            grid-column: span 2;

        }
    </style>
    <script>

        // Create the map
        var map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                })
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([{{$estate->long}}, {{$estate->lat}}]), // set the center to specific longitude and latitude coordinates
                zoom: 15
            })
        });

        // Add a marker on the map
        var markerSource = new ol.source.Vector();
        var markerLayer = new ol.layer.Vector({
            source: markerSource
        });
        map.addLayer(markerLayer);


        var marker = new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.fromLonLat([{{$estate->long}}, {{$estate->lat}}]))
        });
        marker.setStyle(new ol.style.Style({
            image: new ol.style.Icon({
                // anchor: [0.5, 1],
                src: '{{asset('images/ui/pin.png')}}',
                //size 64px
                scale: 0.16
            })
        }));

        // Add the marker feature to the map
        markerSource.addFeature(marker);

    </script>

</x-public-layout>
