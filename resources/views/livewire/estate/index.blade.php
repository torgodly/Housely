<div class="max-w-full md:mx-20 mx-10  pt-10 space-y-2 " x-data="{ShowFilter:false}">
    @if($estates->isEmpty())
        <!-- component -->
        <div class="w-full h-screen flex flex-col items-center justify-center">
            <div class="flex flex-col items-center justify-center">
                <p class="text-3xl md:text-4xl lg:text-5xl text-gray-800 mt-12 capitalize">{{__('No estates found')}}</p>
                <p class="md:text-lg lg:text-xl text-gray-600 mt-8 capitalize">{{__('Sorry, but there are no estates that found maybe change the filter that you have applied. Please try different filter options or contact the support.')}}</p>

                <x-primary-button
                    wire:click="resetFilter()"
                    class="mt-12 !py-2 !px-4 !transition  !text-base  !duration-150 !flex !items-center !space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span>{{__('Clear Filter')}}</span>
                </x-primary-button>
            </div>
        </div>
    @endif
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
                {{__('Filter')}}
            </x-secondary-button>

        </div>
    </div>
    <div class="grid md:grid-cols-4 grid-cols-1  gap-6 ">
        {{--        //cechk if $estates is not null--}}
        @if(isset($estates))
            @foreach($estates as $estate)
                <div class="relative">

                    @if($estate->available == 0 )
                        <div class="absolute top-1/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 w-full">
                            <div
                                class="bg-gradient-to-r from-red-600 to-pink-500 text-white font-bold py-2 px-6 shadow-lg text-center text-xl">
                                {{__('This estate is sold')}}
                            </div>
                        </div>
                    @endif
                    <div class="flex flex-col gap-3 cursor-pointer  @if($estate->available == 0)
        @if(Auth::check() && Auth::user()->role == 'user' or !Auth::check())
        opacity-30 pointer-events-none
         @endif
          @endif"
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
                                                 class="icon icon-tabler icon-tabler-chevron-left" width="24"
                                                 height="24"
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
                                                 class="icon icon-tabler icon-tabler-chevron-right" width="24"
                                                 height="24"
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

                </div>
            @endforeach

        @endif

    </div>


    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + 100 + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
    <div class="relative z-40" x-show="ShowFilter" style="display: none">
        <!-- Background Overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <!-- Filter Content -->
        <div class="fixed inset-0 z-10 ">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform rounded-lg bg-white overflow-y-auto   pt-5 text-left shadow-xl transition-all sm:my-8 w-1/2 max-w-fit  max-h-[90vh]">

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
                                    <x-secondary-button
                                        wire:click="$set('BedRooms', {{null}})"
                                        class=" rounded-xl  capitalize !text-sm !font-bold !border-black {{$BedRooms == null ? '!bg-gray-800 text-white ' : ''}}">
                                        {{__('Any')}}
                                    </x-secondary-button>
                                    @for($i = 1; $i <= 8; $i++)
                                        <x-secondary-button
                                            wire:click="$set('BedRooms', {{$i}})"
                                            class=" rounded-xl  capitalize !text-sm !font-bold !border-black !w-16 flex justify-center items-center {{$BedRooms == $i ? '!bg-gray-800 text-white ' : ''}}">
                                            {{$i}}
                                        </x-secondary-button>
                                    @endfor

                                </div>
                                <div class="w-full space-y-3">
                                    <x-input-label :value="__('Bathroom')"/>
                                    <x-secondary-button
                                        wire:click="$set('BathRooms', {{null}})"
                                        class=" rounded-xl  capitalize !text-sm !font-bold !border-black {{$BathRooms == null ? '!bg-gray-800 text-white ' : ''}}">
                                        {{__('Any')}}
                                    </x-secondary-button>
                                    @for($i = 1; $i <= 8; $i++)
                                        <x-secondary-button
                                            wire:click="$set('BathRooms', {{$i}})"
                                            class="rounded-xl capitalize !text-sm !font-bold !border-black !w-16 flex justify-center items-center {{ $BathRooms == $i ? '!bg-gray-800 text-white' : '' }}">
                                            {{$i}}
                                        </x-secondary-button>
                                    @endfor


                                </div>
                                <div class="w-full space-y-3">
                                    <x-input-label :value="__('Floors')"/>
                                    <x-secondary-button
                                        wire:click="$set('Floors', {{null}})"

                                        class=" rounded-xl  capitalize !text-sm !font-bold !border-black {{$Floors == null ? '!bg-gray-800 text-white ' : ''}}">
                                        {{__('Any')}}
                                    </x-secondary-button>

                                    @for($i = 1; $i <= 8; $i++)
                                        <x-secondary-button
                                            wire:click="$set('Floors', {{$i}})"
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

                                <div class="w-full  mt-4 flex gap-2  ">
                                    <x-secondary-button
                                        wire:click="$set('Type', 'House')"
                                        class=" rounded-xl  capitalize !text-lg !font-bold !border-black flex flex-col !justify-start !items-start gap-8 w-1/4 !h-fit{{$Type == 'House' ? '!bg-gray-200' : ''}}">
                                        <img
                                            src="https://a0.muscache.com/pictures/4d7580e1-4ab2-4d26-a3d6-97f9555ba8f9.jpg"
                                            alt="" class="w-8 h-8">

                                        {{__('House')}}

                                    </x-secondary-button>
                                    <x-secondary-button
                                        wire:click="$set('Type', 'Apartment')"

                                        class=" rounded-xl  capitalize !text-lg !font-bold !border-black flex flex-col !justify-start !items-start gap-8 w-1/4 !h-fit {{$Type == 'Apartment' ? '!bg-gray-200' : ''}}">
                                        <img
                                            src="https://a0.muscache.com/pictures/21cfc7c9-5457-494d-9779-7b0c21d81a25.jpg"
                                            alt="" class="w-8 h-8">
                                        {{__('Apartment')}}

                                    </x-secondary-button>
                                    <x-secondary-button
                                        wire:click="$set('Type', 'Hotel')"
                                        class=" rounded-xl  capitalize !text-lg !font-bold !border-black flex flex-col !justify-start !items-start gap-8 w-1/4 !h-fit {{$Type == 'Hotel' ? '!bg-gray-200' : ''}}">
                                        <img
                                            src="https://a0.muscache.com/pictures/64b27fed-56a1-4f03-950a-d8da08efb428.jpg"
                                            alt="" class="w-8 h-8">

                                        {{__('Hotel')}}

                                    </x-secondary-button>
                                    <x-secondary-button
                                        wire:click="$set('Type', 'Guest House ')"

                                        class=" rounded-xl  capitalize !text-lg !font-bold !border-black flex flex-col !justify-start !items-start gap-8 w-1/4 !h-fit {{$Type == 'GuestHouse ' ? '!bg-gray-200' : ''}}">
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
                        <div class="pt-5" id="propertyUtilities" wire:ignore>
                            <h1 class="text-xl font-bold">{{__('Property Utilities')}}</h1>
                            <div class="flex flex-col gap-5 justify-between mt-5">
                                <div class="grid grid-cols-2 gap-y-7">
                                    @foreach($utilities as $index => $Utility)
                                        <div
                                            class="flex gap-5 items-center justify-start utility-item @if($index >= 8) hidden @endif">
                                            <x-text-input class="w-6 h-6" type="checkbox" :value="$Utility->id"
                                                          wire:model="SelectedUtilities"
                                                          :id="'utility_' . $index" :placeholder="$Utility->name"/>
                                            <x-input-label class="!text-base" :value="__($Utility->name)"/>
                                        </div>
                                    @endforeach
                                </div>


                            </div>
                            <button id="seeMoreBtn"
                                    class="text-lg mt-3 underline @if(count($utilities) <= 8) hidden @endif">
                                {{__('See More')}}
                            </button>
                            <script wire:ignore>
                                const showMoreButton = document.getElementById('seeMoreBtn');
                                const utilityItems = document.querySelectorAll('.utility-item');

                                if (showMoreButton && utilityItems.length > 8) {
                                    showMoreButton.addEventListener('click', function () {
                                        utilityItems.forEach(item => item.classList.remove('hidden'));
                                        showMoreButton.classList.add('hidden');
                                    });
                                }
                            </script>
                        </div>


                    </div>

                    <div
                        class="sticky w-full bg-white border-t-2 bottom-0 right-5 px-4 py-1 flex justify-between items-center">
                        <x-secondary-button wire:click="resetFilter()" @click="ShowFilter = false"
                                            class=" rounded-xl  capitalize !text-sm !font-bold !border-black !w-16 flex justify-center items-center">
                            {{__('Clear')}}
                        </x-secondary-button>
                        <x-primary-button
                            wire:click="applyFilters()" @click="ShowFilter = false"
                            class=" h-12 flex justify-center items-center !text-sm w-fit">
                            {{__('Apply filters ').$ResultsCount}}
                        </x-primary-button>

                    </div>
                </div>

                <!-- Apply or Reset Filters -->

            </div>
        </div>
    </div>
</div>

