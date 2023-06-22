<div class="max-w-full md:mx-20 mx-10  pt-10 space-y-2 ">

    <div class="grid md:grid-cols-4 grid-cols-1  gap-6">
        @foreach($estates as $estate)

            <div class="flex flex-col gap-3 cursor-pointer"  onclick="location.href='{{route('estate.show', $estate->id)}}'" >
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
                            <div class="box flex justify-between items-center mx-2 absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                <button class="bg-white p-1 rounded-full flex justify-center items-center"
                                        x-on:click="activeSlide = activeSlide === 1 ? slides : activeSlide - 1" onclick="event.stopPropagation();">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M15 6l-6 6l6 6"></path>
                                    </svg>
                                </button>
                                <button class="bg-white p-1 rounded-full flex justify-center items-center"
                                        x-on:click="activeSlide = activeSlide === slides ? 1 : activeSlide + 1" onclick="event.stopPropagation();">
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

                    <div class="absolute top-5 right-5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                             aria-hidden="true" role="presentation" focusable="false"
                             style="display: block; fill: rgba(0, 0, 0, 0.5); height: 24px; width: 24px; stroke: white; stroke-width: 2; overflow: visible;"
                        >
                            <path
                                d="M16 28c7-4.73 14-10 14-17a6.98 6.98 0 0 0-7-7c-1.8 0-3.58.68-4.95 2.05L16 8.1l-2.05-2.05a6.98 6.98 0 0 0-9.9 0A6.98 6.98 0 0 0 2 11c0 7 7 12.27 14 17z"></path>
                        </svg>
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
            <x-loader wire:loading='loadMore'/>

    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>

</div>
