<div class="py-12">

    <div class="w-fit min-w-[80%]  mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                <div class="py-1.5 flex justify-between items-center">
                    <x-text-input type="text" class="mt-1 block w-1/3" wire:model="search"
                                  placeholder="{{__('search by name')}}"/>

                    <div>
                        <x-primary-button class="mt-1" x-data=""
                                          x-on:click.prevent="$dispatch('open-modal', 'create-utility')">
                            {{__('Create Utility')}}
                        </x-primary-button>
                        @if(request()->has('search'))
                            <x-secondary-button class="mt-1" wire:click="resetFilters">Reset Filters</x-secondary-button>
                        @endif

                    </div>


                </div>
                <div class="min-w-full align-middle">
                    <table class="min-w-full divide-y divide-gray-200 border">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer" wire:click="OrderBy('name')">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Name')}}</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('estates_count')">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Used times')}}</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Action')}}</span>
                            </th>
                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                        @foreach($utilities as $utility)
                            <tr class="bg-white cursor-pointer">
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    {{ $utility->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    {{ $utility->estates_count }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    <x-primary-button class="bg-green-500 hover:bg-green-700"
                                        x-data=""
                                        wire:click="edit({{ $utility->id }})"
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-utility-edit')">
                                        {{__('Edit')}}
                                    </x-primary-button>
                                    <x-danger-button
                                        x-data=""

                                        wire:click="confirmUtilityDeletion({{ $utility->id }})"
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-utility-deletion')"
                                    >{{ __('Delete') }}
                                    </x-danger-button>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-2">
                    {{ $utilities->links() }}
                </div>

            </div>
        </div>
    </div>

    <x-modal name="confirm-utility-deletion" :show="$errors->userDeletion->isNotEmpty()"
             focusable>
        <form method="post" action="{{ route('utilities.destroy', $confirmUtilityDeletion??0) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this Utility?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your Utility is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete the Utility.') }}
            </p>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
    <x-modal name="confirm-utility-edit" :show="$errors->useredit->isNotEmpty()"
             focusable>
        <form method="post" action="{{ route('utilities.update', $editUtility??0) }}" class="p-6">
            @csrf
            @method('PATCH')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Update Utility Name') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Please enter the new name for the Utility.') }}
            </p>
            <div class="mt-6">
                <x-input-label for="name" value="{{ __('Utility') }}" class="sr-only"/>
                <x-text-input
                    id="utility"
                    name="name"
                    type="text"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Utility name') }}"
                    :value="$editUtility?->name"
                />

                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Update') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
    <x-modal name="create-utility" :show="$errors->useredit->isNotEmpty()"
             focusable>
        <form method="post" action="{{ route('utilities.store') }}" class="p-6">
            @csrf
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Create New Utility') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Please enter the name for the new Utility.') }}
            </p>
            <div class="mt-6">
                <x-input-label for="name" value="{{ __('Utility') }}" class="sr-only"/>
                <x-text-input
                    id="utility"
                    name="name"
                    type="text"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Utility name') }}"
                    :value="old('name')"
                />

                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Create') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>


</div>
