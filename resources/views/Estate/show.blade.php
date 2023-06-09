<x-public-layout>
    <div class="max-w-6xl mx-auto  pt-10 space-y-2">
        <h1 class="text-2xl font-bold pl-2">Centre place Graslin - Private room La Cambronne</h1>
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
                <span class="text-sm font-bold underline">Nantes, Pays de la Loire, France</span>
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
            @foreach($images->take(5) as $image)
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
        <div class="flex justify-between h-[1000px] !mt-12 ">


            <div class="w-fit">
                <div class=" flex justify-between items-center gap-48">
                    <div class="space-y-2">
                        <h1 class="text-2xl font-bold">Entire villa hosted by ThreeSIXTY Estates</h1>
                        <div class="flex gap-1 items-center">
                            <span class="text-base text-gray-500 font-thin">4 guests</span>
                            <span class="text-base text-black font-thin"> · </span> <span
                                class="text-base text-gray-500 font-thin">2 bedrooms</span>
                            <span class="text-base text-black font-thin"> · </span> <span
                                class="text-base text-gray-500 font-thin">2 beds</span>
                        </div>

                    </div>


                    <img class="w-14 h-14 rounded-full"
                         src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Rounded avatar">
                </div>
                <div class="relative my-4">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                </div>

                <div class="mt-8">
                    <h1 class="text-2xl font-bold">What this place offers</h1>
                    <div class="grid grid-cols-2 grid-rows-5 mt-4 ml-1 gap-4">
                        <div class="flex justify-start items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true"
                                 role="presentation" focusable="false"
                                 style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                                <path
                                    d="M26 1a5 5 0 0 1 5 5c0 6.39-1.6 13.19-4 14.7V31h-2V20.7c-2.36-1.48-3.94-8.07-4-14.36v-.56A5 5 0 0 1 26 1zm-9 0v18.12c2.32.55 4 3 4 5.88 0 3.27-2.18 6-5 6s-5-2.73-5-6c0-2.87 1.68-5.33 4-5.88V1zM2 1h1c4.47 0 6.93 6.37 7 18.5V21H4v10H2zm14 20c-1.6 0-3 1.75-3 4s1.4 4 3 4 3-1.75 3-4-1.4-4-3-4zM4 3.24V19h4l-.02-.96-.03-.95C7.67 9.16 6.24 4.62 4.22 3.36L4.1 3.3zm19 2.58v.49c.05 4.32 1.03 9.13 2 11.39V3.17a3 3 0 0 0-2 2.65zm4-2.65V17.7c.99-2.31 2-7.3 2-11.7a3 3 0 0 0-2-2.83z"></path>
                            </svg>
                            <span class="text-[18px] font-thin text-black capitalize">Kitchen</span>
                        </div>
                        <div class="flex justify-start items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true"
                                 role="presentation" focusable="false"
                                 style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                                <path
                                    d="M26 1a5 5 0 0 1 5 5c0 6.39-1.6 13.19-4 14.7V31h-2V20.7c-2.36-1.48-3.94-8.07-4-14.36v-.56A5 5 0 0 1 26 1zm-9 0v18.12c2.32.55 4 3 4 5.88 0 3.27-2.18 6-5 6s-5-2.73-5-6c0-2.87 1.68-5.33 4-5.88V1zM2 1h1c4.47 0 6.93 6.37 7 18.5V21H4v10H2zm14 20c-1.6 0-3 1.75-3 4s1.4 4 3 4 3-1.75 3-4-1.4-4-3-4zM4 3.24V19h4l-.02-.96-.03-.95C7.67 9.16 6.24 4.62 4.22 3.36L4.1 3.3zm19 2.58v.49c.05 4.32 1.03 9.13 2 11.39V3.17a3 3 0 0 0-2 2.65zm4-2.65V17.7c.99-2.31 2-7.3 2-11.7a3 3 0 0 0-2-2.83z"></path>
                            </svg>
                            <span class="text-[18px] font-thin text-black capitalize">Kitchen</span>
                        </div>
                        <div class="flex justify-start items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true"
                                 role="presentation" focusable="false"
                                 style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                                <path
                                    d="M26 1a5 5 0 0 1 5 5c0 6.39-1.6 13.19-4 14.7V31h-2V20.7c-2.36-1.48-3.94-8.07-4-14.36v-.56A5 5 0 0 1 26 1zm-9 0v18.12c2.32.55 4 3 4 5.88 0 3.27-2.18 6-5 6s-5-2.73-5-6c0-2.87 1.68-5.33 4-5.88V1zM2 1h1c4.47 0 6.93 6.37 7 18.5V21H4v10H2zm14 20c-1.6 0-3 1.75-3 4s1.4 4 3 4 3-1.75 3-4-1.4-4-3-4zM4 3.24V19h4l-.02-.96-.03-.95C7.67 9.16 6.24 4.62 4.22 3.36L4.1 3.3zm19 2.58v.49c.05 4.32 1.03 9.13 2 11.39V3.17a3 3 0 0 0-2 2.65zm4-2.65V17.7c.99-2.31 2-7.3 2-11.7a3 3 0 0 0-2-2.83z"></path>
                            </svg>
                            <span class="text-[18px] font-thin text-black capitalize">Kitchen</span>
                        </div>
                        <div class="flex justify-start items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true"
                                 role="presentation" focusable="false"
                                 style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                                <path
                                    d="M26 1a5 5 0 0 1 5 5c0 6.39-1.6 13.19-4 14.7V31h-2V20.7c-2.36-1.48-3.94-8.07-4-14.36v-.56A5 5 0 0 1 26 1zm-9 0v18.12c2.32.55 4 3 4 5.88 0 3.27-2.18 6-5 6s-5-2.73-5-6c0-2.87 1.68-5.33 4-5.88V1zM2 1h1c4.47 0 6.93 6.37 7 18.5V21H4v10H2zm14 20c-1.6 0-3 1.75-3 4s1.4 4 3 4 3-1.75 3-4-1.4-4-3-4zM4 3.24V19h4l-.02-.96-.03-.95C7.67 9.16 6.24 4.62 4.22 3.36L4.1 3.3zm19 2.58v.49c.05 4.32 1.03 9.13 2 11.39V3.17a3 3 0 0 0-2 2.65zm4-2.65V17.7c.99-2.31 2-7.3 2-11.7a3 3 0 0 0-2-2.83z"></path>
                            </svg>
                            <span class="text-[18px] font-thin text-black capitalize">Kitchen</span>
                        </div>
                        <div class="flex justify-start items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true"
                                 role="presentation" focusable="false"
                                 style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                                <path
                                    d="M26 1a5 5 0 0 1 5 5c0 6.39-1.6 13.19-4 14.7V31h-2V20.7c-2.36-1.48-3.94-8.07-4-14.36v-.56A5 5 0 0 1 26 1zm-9 0v18.12c2.32.55 4 3 4 5.88 0 3.27-2.18 6-5 6s-5-2.73-5-6c0-2.87 1.68-5.33 4-5.88V1zM2 1h1c4.47 0 6.93 6.37 7 18.5V21H4v10H2zm14 20c-1.6 0-3 1.75-3 4s1.4 4 3 4 3-1.75 3-4-1.4-4-3-4zM4 3.24V19h4l-.02-.96-.03-.95C7.67 9.16 6.24 4.62 4.22 3.36L4.1 3.3zm19 2.58v.49c.05 4.32 1.03 9.13 2 11.39V3.17a3 3 0 0 0-2 2.65zm4-2.65V17.7c.99-2.31 2-7.3 2-11.7a3 3 0 0 0-2-2.83z"></path>
                            </svg>
                            <span class="text-[18px] font-thin text-black capitalize">Kitchen</span>
                        </div>
                        <div class="flex justify-start items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true"
                                 role="presentation" focusable="false"
                                 style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                                <path
                                    d="M26 1a5 5 0 0 1 5 5c0 6.39-1.6 13.19-4 14.7V31h-2V20.7c-2.36-1.48-3.94-8.07-4-14.36v-.56A5 5 0 0 1 26 1zm-9 0v18.12c2.32.55 4 3 4 5.88 0 3.27-2.18 6-5 6s-5-2.73-5-6c0-2.87 1.68-5.33 4-5.88V1zM2 1h1c4.47 0 6.93 6.37 7 18.5V21H4v10H2zm14 20c-1.6 0-3 1.75-3 4s1.4 4 3 4 3-1.75 3-4-1.4-4-3-4zM4 3.24V19h4l-.02-.96-.03-.95C7.67 9.16 6.24 4.62 4.22 3.36L4.1 3.3zm19 2.58v.49c.05 4.32 1.03 9.13 2 11.39V3.17a3 3 0 0 0-2 2.65zm4-2.65V17.7c.99-2.31 2-7.3 2-11.7a3 3 0 0 0-2-2.83z"></path>
                            </svg>
                            <span class="text-[18px] font-thin text-black capitalize">Kitchen</span>
                        </div>
                        <div class="flex justify-start items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true"
                                 role="presentation" focusable="false"
                                 style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                                <path
                                    d="M26 1a5 5 0 0 1 5 5c0 6.39-1.6 13.19-4 14.7V31h-2V20.7c-2.36-1.48-3.94-8.07-4-14.36v-.56A5 5 0 0 1 26 1zm-9 0v18.12c2.32.55 4 3 4 5.88 0 3.27-2.18 6-5 6s-5-2.73-5-6c0-2.87 1.68-5.33 4-5.88V1zM2 1h1c4.47 0 6.93 6.37 7 18.5V21H4v10H2zm14 20c-1.6 0-3 1.75-3 4s1.4 4 3 4 3-1.75 3-4-1.4-4-3-4zM4 3.24V19h4l-.02-.96-.03-.95C7.67 9.16 6.24 4.62 4.22 3.36L4.1 3.3zm19 2.58v.49c.05 4.32 1.03 9.13 2 11.39V3.17a3 3 0 0 0-2 2.65zm4-2.65V17.7c.99-2.31 2-7.3 2-11.7a3 3 0 0 0-2-2.83z"></path>
                            </svg>
                            <span class="text-[18px] font-thin text-black capitalize">Kitchen</span>
                        </div>
                        <div class="flex justify-start items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true"
                                 role="presentation" focusable="false"
                                 style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                                <path
                                    d="M26 1a5 5 0 0 1 5 5c0 6.39-1.6 13.19-4 14.7V31h-2V20.7c-2.36-1.48-3.94-8.07-4-14.36v-.56A5 5 0 0 1 26 1zm-9 0v18.12c2.32.55 4 3 4 5.88 0 3.27-2.18 6-5 6s-5-2.73-5-6c0-2.87 1.68-5.33 4-5.88V1zM2 1h1c4.47 0 6.93 6.37 7 18.5V21H4v10H2zm14 20c-1.6 0-3 1.75-3 4s1.4 4 3 4 3-1.75 3-4-1.4-4-3-4zM4 3.24V19h4l-.02-.96-.03-.95C7.67 9.16 6.24 4.62 4.22 3.36L4.1 3.3zm19 2.58v.49c.05 4.32 1.03 9.13 2 11.39V3.17a3 3 0 0 0-2 2.65zm4-2.65V17.7c.99-2.31 2-7.3 2-11.7a3 3 0 0 0-2-2.83z"></path>
                            </svg>
                            <span class="text-[18px] font-thin text-black capitalize">Kitchen</span>
                        </div>
                        <div class="flex justify-start items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true"
                                 role="presentation" focusable="false"
                                 style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                                <path
                                    d="M26 1a5 5 0 0 1 5 5c0 6.39-1.6 13.19-4 14.7V31h-2V20.7c-2.36-1.48-3.94-8.07-4-14.36v-.56A5 5 0 0 1 26 1zm-9 0v18.12c2.32.55 4 3 4 5.88 0 3.27-2.18 6-5 6s-5-2.73-5-6c0-2.87 1.68-5.33 4-5.88V1zM2 1h1c4.47 0 6.93 6.37 7 18.5V21H4v10H2zm14 20c-1.6 0-3 1.75-3 4s1.4 4 3 4 3-1.75 3-4-1.4-4-3-4zM4 3.24V19h4l-.02-.96-.03-.95C7.67 9.16 6.24 4.62 4.22 3.36L4.1 3.3zm19 2.58v.49c.05 4.32 1.03 9.13 2 11.39V3.17a3 3 0 0 0-2 2.65zm4-2.65V17.7c.99-2.31 2-7.3 2-11.7a3 3 0 0 0-2-2.83z"></path>
                            </svg>
                            <span class="text-[18px] font-thin text-black capitalize">Kitchen</span>
                        </div>
                        <div class="flex justify-start items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true"
                                 role="presentation" focusable="false"
                                 style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                                <path
                                    d="M26 1a5 5 0 0 1 5 5c0 6.39-1.6 13.19-4 14.7V31h-2V20.7c-2.36-1.48-3.94-8.07-4-14.36v-.56A5 5 0 0 1 26 1zm-9 0v18.12c2.32.55 4 3 4 5.88 0 3.27-2.18 6-5 6s-5-2.73-5-6c0-2.87 1.68-5.33 4-5.88V1zM2 1h1c4.47 0 6.93 6.37 7 18.5V21H4v10H2zm14 20c-1.6 0-3 1.75-3 4s1.4 4 3 4 3-1.75 3-4-1.4-4-3-4zM4 3.24V19h4l-.02-.96-.03-.95C7.67 9.16 6.24 4.62 4.22 3.36L4.1 3.3zm19 2.58v.49c.05 4.32 1.03 9.13 2 11.39V3.17a3 3 0 0 0-2 2.65zm4-2.65V17.7c.99-2.31 2-7.3 2-11.7a3 3 0 0 0-2-2.83z"></path>
                            </svg>
                            <span class="text-[18px] font-thin text-black capitalize">Kitchen</span>
                        </div>
                    </div>
                </div>

            </div>
            <div id="card" class=" flex flex-col items-center gap-6">
                <div class="sticky  top-32 flex flex-col items-center gap-6">
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow  p-6 flex flex-col justify-center text-center drop-shadow-xl">
                        <div class="flex justify-between items-baseline gap-32">
                            <h1 class="text-2xl font-bold ">$1,056 <span class="text-lg font-thin">night</span></h1>
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
                                    $1,500 x
                                    1 month</h1>
                                <h1 class="font-thin text-base text-gray-500">$18,000</h1>
                            </div>
                            <div class="flex justify-between items-baseline gap-32 mt-4">
                                <h1 class="font-thin text-base text-gray-500 underline underline-offset-1 decoration-1">
                                    Long
                                    stay discount</h1>
                                <h1 class="font-thin text-base text-green-500">-$215</h1>
                            </div>
                            <div class="flex justify-between items-baseline gap-32 mt-4">
                                <h1 class="font-thin text-base text-gray-500 underline underline-offset-1 decoration-1">
                                    Cleaning
                                    fee</h1>
                                <h1 class="font-thin text-base text-gray-500">$150</h1>
                            </div>
                            <div class="relative my-4">
                                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                    <div class="w-full border-t border-gray-300"></div>
                                </div>
                            </div>
                            <div class="flex justify-between items-baseline gap-32 mt-4">
                                <h1 class="font-semibold text-lg text-black">Total Price</h1>
                                <h1 class="font-bold text-lg text-black">$18,365</h1>
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

    </div>
    <style>
        #images > :first-child {

            grid-row: span 2;
            grid-column: span 2;

        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#offer').mask("000,000,000,000,000", {reverse: true});
        });
    </script>
</x-public-layout>
