<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Favorites') }}
        </h2>
    </x-slot>
    @if($estates->isEmpty())
        <!-- component -->
        <div class="w-full h-screen flex flex-col items-center justify-center">
            <div class="flex flex-col items-center justify-center">
                <p class="text-3xl md:text-4xl lg:text-5xl text-gray-800 mt-12">{{__('You Dont have Any Favorite Estates')}}</p>
                <p class="md:text-lg lg:text-xl text-gray-600 mt-8 capitalize">{{__('Sorry, You Dont have Any Favorite Estates add some Estates to your Favorites')}}</p>

                <x-primary-button
                    onclick="location.href='/'"
                    class="mt-12 !py-2 !px-4 !transition  !text-base  !duration-150 !flex !items-center !space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span>{{__('Return Home')}}</span>
                </x-primary-button>
            </div>
        </div>
    @else

        <div class="max-w-full md:mx-20 mx-10  pt-10 space-y-2 ">

            <div class="grid md:grid-cols-4 grid-cols-1  gap-6 ">
                {{--        //cechk if $estates is not null--}}
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
                @endforeach


            </div>
        </div>
    @endif


</x-app-layout>
