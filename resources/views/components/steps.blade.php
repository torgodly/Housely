@props(['steps', 'current'])

<nav aria-label="Progress" class="flex justify-center">
    <ol role="list" class="flex items-center">
        @for($i = 1; $i <= $steps; $i++)
            <li class="relative pr-8 sm:pr-20">
                @if($i < $current)
                    <!-- Completed Step -->
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="h-0.5 w-full bg-indigo-600"></div>
                    </div>
                    <a href="#"
                       class="relative flex h-8 w-8 items-center justify-center rounded-full bg-indigo-600 hover:bg-indigo-900">
                        <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <span class="sr-only">Step {{ $i }}</span>
                    </a>
                @elseif($i == $current)
                    @if($i == $steps)
                        <a href="#"
                           class="relative flex h-8 w-8 items-center justify-center rounded-full border-2 border-indigo-600 bg-white"
                           aria-current="step">
                            <span class="h-2.5 w-2.5 rounded-full bg-indigo-600" aria-hidden="true"></span>
                            <span class="sr-only">Step {{ $i }}</span>
                        </a>
                    @else
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="h-0.5 w-full bg-gray-200"></div>
                        </div>
                        <a href="#"
                           class="relative flex h-8 w-8 items-center justify-center rounded-full border-2 border-indigo-600 bg-white"
                           aria-current="step">
                            <span class="h-2.5 w-2.5 rounded-full bg-indigo-600" aria-hidden="true"></span>
                            <span class="sr-only">Step {{ $i }}</span>
                        </a>
                    @endif

                    <!-- Current Step -->

                @else

                    @if($i == $steps)
                        <a href="#"
                           class="group relative flex h-8 w-8 items-center justify-center rounded-full border-2 border-gray-300 bg-white hover:border-gray-400">
                        <span class="h-2.5 w-2.5 rounded-full bg-transparent group-hover:bg-gray-300"
                              aria-hidden="true"></span>
                            <span class="sr-only">Step {{ $i }}</span>
                        </a>
                    @else
                        <!-- Upcoming Step -->
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="h-0.5 w-full bg-gray-200"></div>
                        </div>

                        <a href="#"
                           class="group relative flex h-8 w-8 items-center justify-center rounded-full border-2 border-gray-300 bg-white hover:border-gray-400">
                        <span class="h-2.5 w-2.5 rounded-full bg-transparent group-hover:bg-gray-300"
                              aria-hidden="true"></span>
                            <span class="sr-only">Step {{ $i }}</span>
                        </a>
                    @endif

                @endif
            </li>
        @endfor
    </ol>
</nav>
