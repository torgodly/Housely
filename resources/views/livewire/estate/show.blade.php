<div class="max-w-6xl mx-auto  pt-10 space-y-2 relative" x-data="{ShowImages: false, ShowDescription: false , ShowUtilities: false}">
    <h1 class="text-2xl font-bold pl-2">{{$estate->title}}</h1>
    <div class="flex justify-between items-center">
        <div class="flex justify-start items-center gap-2">
            <span class="text-sm font-bold underline">{{$estate->favoritedBy()->count()}} favorites</span>
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
                <div wire:click="favorite()" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 {{$estate->isFavorited() ? 'fill-primary stroke-primary' : ''}}" viewBox="0 0 24 24" stroke-width="1"
                         stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" >
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
                    </svg>
                </div>

                <span class="text-sm font-bold underline">{{__('favorite')}}</span>
            </div>
        </div>
    </div>
    <div class="!mt-6 grid grid-rows-2 grid-cols-4  rounded-xl overflow-clip  gap-2 relative" id="images">
        @foreach($estate->images->take(5) as $image)
            <img src="{{asset('storage/estates/'.$image->path)}}" alt=""
                 class="w-full h-full object-cover shadow-md">
        @endforeach
        <div
            class="absolute bottom-10 bg-white border rounded-xl border-black right-10 flex justify-center items-center gap-2 px-4 py-2 cursor-pointer"
            @click="ShowImages = true">
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
                    <div>
                        <h1 class="text-base font-bold capitalize text-center">{{__('Land Area')}}</h1>
                        <div
                            class="px-6 py-3 border border-black rounded-xl flex justify-center items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shovel" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M17 4l3 3"></path>
                                <path d="M18.5 5.5l-8 8"></path>
                                <path d="M8.276 11.284l4.44 4.44a.968 .968 0 0 1 0 1.369l-2.704 2.704a4.108 4.108 0 0 1 -5.809 -5.81l2.704 -2.703a.968 .968 0 0 1 1.37 0z"></path>
                            </svg>
                            <span class="text-base font-bold capitalize">{{$estate->land_area}} {{__('square meters')}}</span>
                        </div>
                    </div>

                    <div>
                        <h1 class="text-base font-bold capitalize text-center">{{__('Building Area')}}</h1>

                        <div
                            class="px-6 py-3 border border-black rounded-xl flex justify-center items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wall" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                <path d="M4 8h16"></path>
                                <path d="M20 12h-16"></path>
                                <path d="M4 16h16"></path>
                                <path d="M9 4v4"></path>
                                <path d="M14 8v4"></path>
                                <path d="M8 12v4"></path>
                                <path d="M16 12v4"></path>
                                <path d="M11 16v4"></path>
                            </svg>
                            <span class="text-base font-bold capitalize">{{$estate->building_area}} {{__('square meters')}}</span>
                        </div>
                    </div>

                    <div>
                        <h1 class="text-base font-bold capitalize text-center">{{__('Floors')}}</h1>
                        <div
                            class="px-6 py-3 border border-black rounded-xl flex justify-center items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-community" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path>
                                <path d="M13 7l0 .01"></path>
                                <path d="M17 7l0 .01"></path>
                                <path d="M17 11l0 .01"></path>
                                <path d="M17 15l0 .01"></path>
                            </svg>
                            <span class="text-base font-bold capitalize">{{$estate->floors}}</span>
                        </div>
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
                    <h1 class="text-base font-bold underline " @click="ShowDescription = true">
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
                        </div>
                    @endforeach
                </div>
                <x-secondary-button @click="ShowUtilities = true" class="mt-6 rounded-xl !px-6 py-3 capitalize !text-sm !font-bold !border-black" >
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

                            <div role="status">
                                <svg aria-hidden="true" class="w-6 h-6 mr-2 text-white animate-spin  fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </div>

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
                            <h1 class="font-thin text-base text-gray-500">${{number_format($estate->price)}}</h1>
                        </div>
                        <div class="flex justify-between items-baseline gap-32 mt-4">
                            <h1 class="font-thin text-base text-gray-500 underline underline-offset-1 decoration-1">
                                {{$estate->discount}}% discount</h1>
                            <h1 class="font-thin text-base text-green-500">
                                -${{ number_format($estate->price * ($estate->discount / 100)) }}</h1>
                        </div>
                        <div class="flex justify-between items-baseline gap-32 mt-4">
                            <h1 class="font-thin text-base text-gray-500 underline underline-offset-1 decoration-1">
                                {{$estate->commission}}% commission</h1>
                            <h1 class="font-thin text-base text-gray-500">
                                ${{ number_format(($estate->price * $estate->commission) / 100) }}</h1>
                        </div>
                        <div class="relative my-4">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                        </div>
                        <div class="flex justify-between items-baseline gap-32 mt-4">
                            <h1 class="font-semibold text-lg text-black">Total Price</h1>
                            <h1 class="font-bold text-lg text-black">
                                ${{ number_format($estate->price - ($estate->price * $estate->discount / 100),) }}</h1>
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

    <div class="relative z-10" style="display: none" x-show="ShowDescription"
    >

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-y-scroll  rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg md:max-w-7xl sm:p-6 max-h-[90vh] ">
                    <div class=" sticky top-0  px-4 py-1 flex justify-end items-center  ">
                        <button type="button"
                                class="rounded-md bg-primary text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 shadow-md"
                                @click="ShowDescription = false">
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6 stroke-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col  items-center gap-2">
                        <p class="text-base font-light text-black mt-4 ">
                            {!! $estate->description !!}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="relative z-10" style="display: none" x-show="ShowImages"
    >

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-y-scroll  rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg md:max-w-7xl sm:p-6 max-h-[90vh] ">
                    <div class=" sticky top-0  px-4 py-1 flex justify-end items-center  ">
                        <button type="button"
                                class="rounded-md bg-primary text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 shadow-md"
                                @click="ShowImages = false">
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6 stroke-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col  items-center gap-2">
                        @foreach($estate->images as $image)
                            <img src="{{asset('storage/estates/'.$image->path)}}" alt=""
                                 class="w-full h-full object-cover shadow-md">
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="relative z-10" style="display: none" x-show="ShowUtilities"
    >

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-y-scroll  rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg md:max-w-7xl sm:p-6 max-h-[90vh] ">
                    <div class=" sticky top-0  px-4 py-1 flex justify-end items-center  ">
                        <button type="button"
                                class="rounded-md bg-primary text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 shadow-md"
                                @click="ShowUtilities = false">
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6 stroke-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col justify-start items-center gap-2">
                        @foreach($estate->utilities as $utility)
                            <p class="text-[18px] font-thin text-black capitalize">
                                {{$utility->name}}
                                <span class="text-base text-gray-800 lowercase">x {{$utility->quantity}}</span>

                            </p>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

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

