<div class="max-w-full md:mx-20 mx-10  pt-10 space-y-2 " x-data="{ShowFilter:false}">

    <div class="flex justify-between items-center">
        <div class="flex gap-2">
            <x-secondary-button class="flex justify-center items-center gap-2" @click="ShowFilter = true">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" width="24"
                     height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path
                        d="M12 20l-3 1v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v3"></path>
                    <path d="M16 19h6"></path>
                    <path d="M19 16v6"></path>
                </svg>
                filter
            </x-secondary-button>

        </div>
    </div>
    <div class="grid md:grid-cols-4 grid-cols-1  gap-6">
        @foreach($estates as $estate)
            <div class="flex flex-col gap-3 cursor-pointer"
                 onclick="location.href='{{route('estate.show', $estate->id)}}'">
                <div class="relative">
                    <!-- component -->
                    <div class="group"
                         x-data="{ activeSlide: 1, slides: {{ count($estate->images) }} }">
                        <div class="relative">
                            <!-- Slides -->
                            @foreach($estate->images as $key => $image)
                                <div x-show="activeSlide === {{ $key + 1 }}">
                                    <img src="{{asset('storage/estates/'.$image->path)}}"
                                         alt=""
                                         class="w-full h-80 rounded-xl object-cover shadow-md">
                                </div>
                            @endforeach

                            <!-- Prev/Next arrow buttons (hidden by default) -->
                            <div
                                class="box flex justify-between items-center mx-2 absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                <button class="bg-white p-1 rounded-full flex justify-center items-center"
                                        x-on:click="activeSlide = activeSlide === 1 ? slides : activeSlide - 1"
                                        onclick="event.stopPropagation();">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M15 6l-6 6l6 6"></path>
                                    </svg>
                                </button>
                                <button class="bg-white p-1 rounded-full flex justify-center items-center"
                                        x-on:click="activeSlide = activeSlide === slides ? 1 : activeSlide + 1"
                                        onclick="event.stopPropagation();">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="icon icon-tabler icon-tabler-chevron-right" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9 6l6 6l-6 6"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <div>
                    <h1 class="text-base font-bold">
                        {{ $estate->title}}
                    </h1>
                    <h1 class="font-thin text-base text-gray-500 ">
                        {{ $estate->address}}
                    </h1>
                    <h1 class="text-base font-bold ">${{number_format($estate->price)}}</h1>
                </div>
            </div>
        @endforeach

    </div>


    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + 200 + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
    <div class="relative z-10" x-show="ShowFilter" style="display: none">
        <!-- Background Overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <!-- Filter Content -->
        <div class="fixed inset-0 z-10 ">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform rounded-lg bg-white overflow-y-auto   pt-5 text-left shadow-xl transition-all sm:my-8 w-1/2 max-w-lg md:max-w-7xl  max-h-[90vh]">

                    <div class="px-4 pb-5">
                        <!-- Close Button -->
                        <div class="sticky top-0 px-4 py-1 flex justify-end items-center">
                            <button type="button"
                                    @click="ShowFilter = false"
                                    class="rounded-md bg-primary text-white hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 shadow-md"
                                    >
                                <span class="sr-only">Close</span>
                                <svg class="h-6 w-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Filter Content Here -->
                        {{--start price filter--}}
                        <div>
                            <h1 class="text-xl font-bold">{{__('Price')}}</h1>
                            <div class="flex gap-2 justify-between">
                                <div class="w-full">
                                    <x-input-label for="minPrice" :value="__('Minimum Price')"/>
                                    <x-text-input class="w-full" type="number" id="minPrice" name="minPrice"
                                                  wire:model="MinPrice"
                                                  placeholder="{{__('From')}}"/>
                                </div>
                                <div class="w-full">
                                    <x-input-label for="maxPrice" :value="__('Maximum Price')"/>
                                    <x-text-input class="w-full" type="number" id="maxPrice" name="maxPrice"
                                                  wire:model="MaxPrice"
                                                  placeholder="{{__('TO')}}"/>
                                </div>
                            </div>

                        </div>
                        {{--end price filtere--}}

                        <div class="relative my-4">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                        </div>
                        {{--                       area filter --}}
                        <div class="pt-5">
                            <h1 class="text-xl font-bold">{{__('Area')}}</h1>
                            <div class="flex gap-2 justify-between">
                                <div class="w-full">
                                    <x-input-label for="minArea" :value="__('Minimum Area')"/>
                                    <x-text-input class="w-full" type="number" id="minArea" name="minArea"
                                                  wire:model="MinArea"
                                                  placeholder="{{__('From')}}"/>
                                </div>
                                <div class="w-full">
                                    <x-input-label for="maxArea" :value="__('Maximum Area')"/>
                                    <x-text-input class="w-full" type="number" id="maxArea" name="maxArea"
                                                  wire:model="MaxArea"
                                                  placeholder="{{__('TO')}}"/>
                                </div>
                            </div>

                        </div>
                        {{--end area filtere--}}
                        <div class="relative my-4">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                        </div>
                        {{--                        rooms filter--}}
                        <div class="pt-5">
                            <h1 class="text-xl font-bold">{{__('Rooms')}}</h1>
                            <div class="flex flex-col gap-5 justify-between ">
                                <div class="w-full space-y-3">
                                    <x-input-label :value="__('Bedrooms')"/>
                                    <x-secondary-button wire:click="setBedRooms(null)"
                                                        class=" rounded-xl  capitalize !text-sm !font-bold !border-black {{$BedRooms == null ? '!bg-gray-800 text-white ' : ''}}">
                                        {{__('Any')}}
                                    </x-secondary-button>
                                    @for($i = 1; $i <= 8; $i++)
                                        <x-secondary-button wire:click="setBedRooms({{$i}})"
                                                            class=" rounded-xl  capitalize !text-sm !font-bold !border-black !w-16 flex justify-center items-center {{$BedRooms == $i ? '!bg-gray-800 text-white ' : ''}}">
                                            {{$i}}
                                        </x-secondary-button>
                                    @endfor

                                </div>
                                <div class="w-full space-y-3">
                                    <x-input-label :value="__('Bathroom')"/>
                                    <x-secondary-button
                                        wire:click="setBathRooms(null)"
                                        class=" rounded-xl  capitalize !text-sm !font-bold !border-black {{$BathRooms == null ? '!bg-gray-800 text-white ' : ''}}">
                                        {{__('Any')}}
                                    </x-secondary-button>
                                    @for($i = 1; $i <= 8; $i++)
                                        <x-secondary-button wire:click="setBathRooms({{$i}})"
                                                            class=" rounded-xl  capitalize !text-sm !font-bold !border-black !w-16 flex justify-center items-center {{$BathRooms == $i ? '!bg-gray-800 text-white ' : ''}}">
                                            {{$i}}
                                        </x-secondary-button>
                                    @endfor

                                </div>
                                <div class="w-full space-y-3">
                                    <x-input-label :value="__('Floors')"/>
                                    <x-secondary-button
                                        wire:click="setFloors(null)"

                                        class=" rounded-xl  capitalize !text-sm !font-bold !border-black {{$Floors == null ? '!bg-gray-800 text-white ' : ''}}">
                                        {{__('Any')}}
                                    </x-secondary-button>

                                    @for($i = 1; $i <= 8; $i++)
                                        <x-secondary-button wire:click="setFloors({{$i}})"
                                                            class=" rounded-xl  capitalize !text-sm !font-bold !border-black !w-16 flex justify-center items-center {{$Floors == $i ? '!bg-gray-800 text-white ' : ''}}">
                                            {{$i}}
                                        </x-secondary-button>
                                    @endfor

                                </div>
                            </div>

                        </div>
                        {{--                    end rooms filter--}}
                        <div class="relative my-4">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                        </div>
                        {{--                    start type filter--}}
                        <div class="pt-5">
                            <h1 class="text-xl font-bold">{{__('Property type')}}</h1>
                            <div class="flex flex-col gap-5 justify-between ">

                                <div class="w-full  mt-4 flex gap-2 ">
                                    <x-secondary-button
                                        wire:click="setType('House')"
                                        class=" rounded-xl  capitalize !text-lg !font-bold !border-black flex flex-col !justify-start !items-start gap-9 w-1/4 {{$Type == 'House' ? '!bg-gray-200' : ''}}">
                                        <img
                                            src="https://a0.muscache.com/pictures/4d7580e1-4ab2-4d26-a3d6-97f9555ba8f9.jpg"
                                            alt="" class="w-8 h-8">

                                        {{__('House')}}

                                    </x-secondary-button>
                                    <x-secondary-button
                                        wire:click="setType('Apartment')"

                                        class=" rounded-xl  capitalize !text-lg !font-bold !border-black flex flex-col !justify-start !items-start gap-9 w-1/4 {{$Type == 'Apartment' ? '!bg-gray-200' : ''}}">
                                        <img
                                            src="https://a0.muscache.com/pictures/21cfc7c9-5457-494d-9779-7b0c21d81a25.jpg"
                                            alt="" class="w-8 h-8">
                                        {{__('Apartment')}}

                                    </x-secondary-button>
                                    <x-secondary-button
                                        wire:click="setType('Hotel')"

                                        class=" rounded-xl  capitalize !text-lg !font-bold !border-black flex flex-col !justify-start !items-start gap-9 w-1/4 {{$Type == 'Hotel' ? '!bg-gray-200' : ''}}">
                                        <img
                                            src="https://a0.muscache.com/pictures/64b27fed-56a1-4f03-950a-d8da08efb428.jpg"
                                            alt="" class="w-8 h-8">

                                        {{__('Hotel')}}

                                    </x-secondary-button>
                                    <x-secondary-button
                                        wire:click="setType('Guest_House')"

                                        class=" rounded-xl  capitalize !text-lg !font-bold !border-black flex flex-col !justify-start !items-start gap-9 w-1/4 {{$Type == 'Guest_House' ? '!bg-gray-200' : ''}}">
                                        <img
                                            src="https://a0.muscache.com/pictures/6f261426-2e47-4c91-8b1a-7a847da2b21b.jpg"
                                            alt="" class="w-8 h-8">

                                        {{__('Guest House')}}

                                    </x-secondary-button>

                                </div>
                            </div>

                        </div>
                        <div class="relative my-4 ">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                        </div>
                        {{--                    end type filter--}}

                        {{--                    start utity filter--}}
                        <div class="pt-5">
                            <h1 class="text-xl font-bold">{{__('Property Utilities')}}</h1>
                            <div class="flex flex-col gap-5 justify-between mt-5">
                                <div class="grid grid-cols-2 gap-y-7">
                                    @foreach($Utilities as $Utility)
                                        <div class="flex gap-5 items-center justify-start">
                                            <x-text-input class="w-6 h-6" type="checkbox" name="air_conditioning"
                                                          :value="$Utility->id" wire:model="SelectedUtilities"
                                                          id="air_conditioning" placeholder="Air conditioning"/>
                                            <x-input-label class="!text-base" :value="__($Utility->name)"/>

                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                    </div>

                    <div
                        class="sticky w-full bg-white border-t-2 bottom-0 right-5 px-4 py-1 flex justify-between items-center">
                        <x-secondary-button wire:click="resetFilter()"  @click="ShowFilter = false"
                            class=" rounded-xl  capitalize !text-sm !font-bold !border-black !w-16 flex justify-center items-center">
                            {{__('Clear')}}
                        </x-secondary-button>
                        <x-primary-button class="w-40 h-12 flex justify-center items-center !text-sm">
                            {{__('Apply filters')}}
                        </x-primary-button>

                    </div>
                </div>

                <!-- Apply or Reset Filters -->

            </div>
        </div>
    </div>
</div>

