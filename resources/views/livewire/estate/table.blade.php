<div class="py-12">
    <div class="max-w-fit mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                <div class="py-1.5">
                    <x-text-input type="text" class="mt-1 block w-1/3" wire:model="search"
                                  placeholder="search by code or phone number"/>

                </div>
                <div class="min-w-full align-middle">
                    <table class="min-w-full divide-y divide-gray-200 border">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer" wire:click="OrderBy('type')">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Type')}}</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('company')">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Company')}}</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('address')">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Address')}}</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('land_area')">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Area')}}</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('floors')">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Floors')}}</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('price')">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Price')}}</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('discount')">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Discount')}}</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('commission')">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Commission')}}</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('available')">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Available')}}</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer">
                            <span
                                class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Action')}}</span>
                            </th>
                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                        @foreach($estates as $estate)
                            <tr class="bg-white cursor-pointer"
                                onclick="location.href='{{route('estate.show', $estate->id)}}'">
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    {{ $estate->type }} {{ $estate->id}}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    {{ $estate->company }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    {{ $estate->address }} - {{ $estate->city }} - {{ $estate->country }}
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    {{ $estate->land_area }} - {{ $estate->building_area }}
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    {{ $estate->floors }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    ${{ number_format($estate->price) }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    %{{ $estate->discount }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    %{{ $estate->commission }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    @if($estate->available)
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="icon icon-tabler icon-tabler-circle-key-filled" width="24"
                                             height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path class="!stroke-green-500 !fill-green-500"
                                                  d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -20 0c0 -5.523 4.477 -10 10 -10zm2 5a3 3 0 0 0 -2.98 2.65l-.015 .174l-.005 .176l.005 .176c.019 .319 .087 .624 .197 .908l.09 .209l-3.5 3.5l-.082 .094a1 1 0 0 0 0 1.226l.083 .094l1.5 1.5l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l.083 -.094a1 1 0 0 0 0 -1.226l-.083 -.094l-.792 -.793l.585 -.585l.793 .792l.094 .083a1 1 0 0 0 1.403 -1.403l-.083 -.094l-.792 -.793l.792 -.792a3 3 0 1 0 1.293 -5.708zm0 2a1 1 0 1 1 0 2a1 1 0 0 1 0 -2z"
                                                  stroke-width="0" fill="currentColor"></path>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="icon icon-tabler icon-tabler-circle-key-filled" width="24"
                                             height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path class="!stroke-red-500 !fill-red-500"
                                                  d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -20 0c0 -5.523 4.477 -10 10 -10zm2 5a3 3 0 0 0 -2.98 2.65l-.015 .174l-.005 .176l.005 .176c.019 .319 .087 .624 .197 .908l.09 .209l-3.5 3.5l-.082 .094a1 1 0 0 0 0 1.226l.083 .094l1.5 1.5l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l.083 -.094a1 1 0 0 0 0 -1.226l-.083 -.094l-.792 -.793l.585 -.585l.793 .792l.094 .083a1 1 0 0 0 1.403 -1.403l-.083 -.094l-.792 -.793l.792 -.792a3 3 0 1 0 1.293 -5.708zm0 2a1 1 0 1 1 0 2a1 1 0 0 1 0 -2z"
                                                  stroke-width="0" fill="currentColor"></path>
                                        </svg>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900"
                                    onclick="event.stopPropagation();">
                                    <x-danger-button
                                        x-data=""
                                        wire:click="confirmEstateDeletion({{ $estate->id }})"
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-estate-deletion')"
                                    >{{ __('Delete Account') }}
                                    </x-danger-button>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-2">
                    {{ $estates->links() }}
                </div>

            </div>
        </div>
    </div>
    <x-modal name="confirm-estate-deletion" :show="$errors->userDeletion->isNotEmpty()"
             focusable>
        <form method="post" action="{{ route('estate.destroy', $confirmEstateDeletion??0) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this Estate?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your Estate is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete the Estate.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only"/>

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->estateDeletion->get('password')" class="mt-2"/>
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete Estate') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>


</div>
