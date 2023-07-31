<div class="py-12">

    <div class="max-w-fit mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                <div class="py-1.5 flex justify-between items-center">
                    <x-text-input type="text" class="mt-1 block w-1/3" wire:model="search"
                                  placeholder="{{__('search by code or phone number')}}"/>
                    @if(request()->has('ID') || request()->has('phone_number') || request()->has('search'))
                        <x-secondary-button class="mt-1" wire:click="resetFilters">Reset Filters</x-secondary-button>
                    @endif

                </div>
                <div class="min-w-full align-middle">
                    <table class="min-w-full divide-y divide-gray-200 border">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer" wire:click="OrderBy('code')">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Code')}}</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('estates.title')">
                                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Estate Code')}}</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('phone_number')">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('phone number')}}</span>
                            </th>

                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('estates.address')">
                                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Address')}}</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('estates.price')">
                                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Price')}}</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('estates.discount')">
                                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Discount')}}</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('estates.commission')">
                                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('Commission')}}</span>
                            </th>
                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                        @foreach($orders as $order)
                            <tr class="bg-white cursor-pointer">
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    {{ $order->code }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900"  onclick="location.href='{{route('orders.index', ['ID' => $order->estate->id])}}'">
                                    {{ $order->estate->code }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900"  onclick="location.href='{{route('orders.index', ['phone_number' => $order->phone_number])}}'">
                                    {{ $order->phone_number }}
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    {{ $order->estate->address }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    ${{ number_format($order->estate->price) }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    %{{ $order->estate->discount }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    %{{ $order->estate->commission }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-2">
                    {{ $orders->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
