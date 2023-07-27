<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer" wire:click="OrderBy('code')">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">code</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('phone_number')">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">phone number</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('estates.title')">
                                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">estate title</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('estates.address')">
                                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">estate Address</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('estates.price')">
                                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">estate price</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('estates.discount')">
                                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">estate discount</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                wire:click="OrderBy('estates.commission')">
                                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">estate commission</span>
                            </th>
                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                        @foreach($orders as $order)
                            <tr class="bg-white cursor-pointer"
                                onclick="location.href='{{route('estate.show', $order->estate->id)}}'">
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    {{ $order->code }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    {{ $order->phone_number }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    {{ $order->estate->title }}
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
