<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 ">

        <div class="relative p-4 sm:p-8 bg-white shadow sm:rounded-lg absolute">

            <x-steps steps="8" current="{{$step}}"></x-steps>

            <div class="max-w-full">

                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('create New Estate') }}
                            {{$description}}
                        </h2>
                    </header>
{{--                    <form action="{{route('estate.store')}}" method="post">--}}
{{--                        @csrf--}}
                        <div class="mt-6 space-y-6">
                            <div class="{{ $step != 1 ? 'hidden' : '' }} max-w-xl">
                                <div>
                                    <x-input-label for="title" :value="__('Estate title')"/>

                                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                                  wire:model="title"
                                                  autocomplete="title"/>
                                    <x-input-error :messages="$errors->get('title')"
                                                   class="mt-2"/>
                                </div>
                                <div>
                                    <x-input-label for="type" :value="__('Estate Type')"/>

                                    <x-select-input id="type" name="type" label="Estate Type" type="text"
                                                    class="mt-1 block w-full"
                                                    wire:model="type"
                                                    :options="\App\Enums\EstateType::array()"

                                                    autocomplete="type"/>
                                    <x-input-error :messages="$errors->get('type')"
                                                   class="mt-2"/>
                                </div>
                                <div>
                                    <x-input-label for="address" :value="__('Estate Address')"/>

                                    <x-text-input id="address" name="address" type="text" class="mt-1 block w-full"
                                                  wire:model="address"
                                                  autocomplete="address"/>
                                    <x-input-error :messages="$errors->get('address')"
                                                   class="mt-2"/>
                                </div>
                                <div>
                                    <x-input-label for="city" :value="__('Estate City')"/>

                                    <x-text-input id="city" name="city" type="text" class="mt-1 block w-full"
                                                  wire:model="city"
                                                  autocomplete="city"/>
                                    <x-input-error :messages="$errors->get('city')"
                                                   class="mt-2"/>
                                </div>
                                <div>
                                    <x-input-label for="country" :value="__('Estate Country')"/>

                                    <x-text-input id="country" name="country" type="text" class="mt-1 block w-full"
                                                  wire:model="country"
                                                  autocomplete="country"/>
                                    <x-input-error :messages="$errors->get('country')"
                                                   class="mt-2"/>
                                </div>
                                <div>
                                    <x-input-label for="company" :value="__('Estate Company')"/>

                                    <x-text-input id="company" name="company" type="text" class="mt-1 block w-full"
                                                  wire:model="company"
                                                  autocomplete="company"/>
                                    <x-input-error :messages="$errors->get('company')"
                                                   class="mt-2"/>
                                </div>
                            </div>
                            <div class="{{ $step != 2 ? 'hidden' : '' }} max-w-xl">
                                <div>
                                    <x-input-label for="land_area" :value="__('Estate Land Area')"/>
                                    <x-text-input id="land_area" name="land_area" type="number" step="0.00001"
                                                  class="mt-1 block w-full" wire:model="land_area"
                                                  autocomplete="land_area"/>
                                    <x-input-error :messages="$errors->get('land_area')"
                                                   class="mt-2"/>
                                </div>
                                <div>
                                    <x-input-label for="building_area" :value="__('Estate Building Area')"/>
                                    <x-text-input id="building_area" name="building_area" type="number" step="0.00001"
                                                  class="mt-1 block w-full" wire:model="building_area"
                                                  autocomplete="building_area"/>
                                    <x-input-error :messages="$errors->get('building_area')"
                                                   class="mt-2"/>
                                </div>

                            </div>
                            <div class="{{ $step != 3 ? 'hidden' : '' }}">
                                <div class="" wire:ignore>

                                    <div id="map" style="width:100%; height:400px;"></div>

                                    <p>Longitude: <span id="longitude"></span></p>
                                    <p>Latitude: <span id="latitude"></span></p>
                                    <x-text-input id="lat" name="lat" type="hidden" wire:model="latitude"/>
                                    <x-text-input id="long" name="long" type="hidden" wire:model="longitude"/>
                                </div>
                            </div>
                            <div class="{{ $step != 4 ? 'hidden' : '' }} max-w-xl">
                                <div>
                                    <x-input-label for="price" :value="__('Estate Price')"/>
                                    <x-text-input id="price" name="price" type="number" step="0.00001"
                                                  class="mt-1 block w-full" wire:model="price"
                                                  autocomplete="price"/>
                                    <x-input-error :messages="$errors->get('price')"
                                                   class="mt-2"/>
                                </div>
                                <div>
                                    <x-input-label for="discount" :value="__('Estate Discount')"/>
                                    <x-text-input id="discount" name="discount" type="number" step="0.00001"
                                                  :value="0"
                                                  class="mt-1 block w-full" wire:model="discount"
                                                  autocomplete="discount"/>
                                    <x-input-error :messages="$errors->get('discount')"
                                                   class="mt-2"/>
                                </div>
                                <div>
                                    <x-input-label for="commission" :value="__('Estate Commission')"/>
                                    <x-text-input id="commission" name="commission" type="number" step="0.00001"
                                                  class="mt-1 block w-full" wire:model="commission"
                                                  :value="0"
                                                  autocomplete="commission"/>
                                    <x-input-error :messages="$errors->get('commission')"
                                                   class="mt-2"/>
                                </div>


                            </div>
                            <div class="{{ $step != 5 ? 'hidden' : '' }} max-w-xl">
                                <div>
                                    <x-input-label for="floors" :value="__('Estate Floors')"/>
                                    <x-text-input id="floors" name="floors" type="number" step="0.00001"
                                                  class="mt-1 block w-full" wire:model="floors"
                                                  autocomplete="floors"/>
                                    <x-input-error :messages="$errors->get('floors')"
                                                   class="mt-2"/>
                                </div>
                                <div>
                                    <x-input-label for="bedrooms" :value="__('Estate Bedrooms')"/>
                                    <x-text-input id="bedrooms" name="bedrooms" type="number" step="0.00001"
                                                  :value="0"
                                                  class="mt-1 block w-full" wire:model="bedrooms"
                                                  autocomplete="bedrooms"/>
                                    <x-input-error :messages="$errors->get('bedrooms')"
                                                   class="mt-2"/>
                                </div>
                                <div>
                                    <x-input-label for="bathrooms" :value="__('Estate Bathrooms')"/>
                                    <x-text-input id="bathrooms" name="bathrooms" type="number" step="0.00001"
                                                  class="mt-1 block w-full" wire:model="bathrooms"
                                                  :value="0"
                                                  autocomplete="bathrooms"/>
                                    <x-input-error :messages="$errors->get('bathrooms')"
                                                   class="mt-2"/>
                                </div>
                            </div>
                            <div class="{{ $step != 6 ? 'hidden' : '' }} ">
                                <div class="w-full" wire:ignore>
                                    <x-input-label for="description" :value="__('Description')"/>
                                    <x-WYSIWYG name="description" ></x-WYSIWYG>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2 "/>

                                </div>
                            </div>
                            <div class="{{ $step != 7 ? 'hidden' : '' }}">
                                <div class="">
                                    <div class="py-12">
                                        <div class="w-full  mx-auto sm:px-6 lg:px-8">
                                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                                                <div
                                                    class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                                                    <div class="py-1.5">
                                                        <x-text-input type="text" class="mt-1 block w-1/3"
                                                                      wire:model="search"
                                                                      placeholder="{{__('search')}}"/>

                                                    </div>
                                                    <div class="min-w-full align-middle">
                                                        <table class="min-w-full divide-y divide-gray-200 border">
                                                            <thead>
                                                            <tr>
                                                                <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                                                    wire:click="OrderBy('code')">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('name')}}</span>
                                                                </th>
                                                                <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                                                    wire:click="OrderBy('code')">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('select')}}</span>
                                                                </th>
                                                                <th class="px-6 py-3 bg-gray-50 text-left cursor-pointer"
                                                                    wire:click="OrderBy('code')">
                                <span
                                    class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('count')}}</span>
                                                                </th>

                                                            </tr>
                                                            </thead>

                                                            <tbody
                                                                class="bg-white divide-y divide-gray-200 divide-solid">
                                                            @foreach($allUtilities as $allUtilitie)
                                                                <tr class="bg-white cursor-pointer">
                                                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                                                        {{ $allUtilitie->name }}
                                                                    </td>
                                                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                                                        <x-text-input type="checkbox"
                                                                                      wire:click="toggleUtility({{$allUtilitie->id}})"
                                                                                      value="1"/>
                                                                    </td>
                                                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                                                        @if(isset($utilities[$allUtilitie->id]['quantity']))
                                                                            <x-text-input type="number"
                                                                                          wire:model.lazy="utilities.{{ $allUtilitie->id }}.quantity"
                                                                                          value="{{$utilities[$allUtilitie->id]['quantity'] ?? 1}}"/>

                                                                        @else
                                                                            <x-text-input type="number"
                                                                                          disabled
                                                                                          wire:model.lazy="utilities.{{ $allUtilitie->id }}.quantity"
                                                                                          class="bg-gray-100"/>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="mt-2">
                                                        {{ $allUtilities->links() }}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </div>
                            <div class="{{ $step != 8 ? 'hidden' : '' }}">
                                <div class="" wire:ignore>

                                    <div class="mb-4">
                                        <label for="images" class="block font-medium text-gray-700">Estate
                                            Images</label>
                                        <x-text-input accept="image/jpg, image/png, image/jpeg" name="images[]"
                                                      id="images"
                                                      multiple wire:model="images" onchange="previewImages()"
                                                      class="block w-full text-sm text-gray-900 border border-gray-700 rounded-lg cursor-pointer bg-gray-50 focus:outline-none "
                                                      type='file'/>
                                    </div>


                                    <div id="preview" class="flex justify-center items-center gap-4 flex-wrap"></div>


                                </div>


                            </div>
                            <div class="flex items-center justify-between flex-row-reverse gap-4">
                                @if($step != 8)
                                    <x-primary-button wire:click="nextStep" disabled="{{ $step == 8 }}"
                                                      type="button">{{ __('Next') }}</x-primary-button>
                                    <x-primary-button wire:click="previousStep" disabled="{{ $step == 1 }}"
                                                      type="button">{{ __('prev') }}</x-primary-button>
                                @else
                                    <x-primary-button wire:click="submit"
                                        type="Submit">{{ __('Submit') }}</x-primary-button>
                                    <x-primary-button wire:click="previousStep" disabled="{{ $step == 1 }}"
                                                      type="button">{{ __('prev') }}</x-primary-button>
                                @endif

                            </div>

                        </div>
{{--                    </form>--}}
                </section>
            </div>
        </div>
    </div>

    <script>

        // Create the map
        var map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                })
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([27.974478, 8.82]),
                zoom: 4
            })
        });

        // Add a marker on the map
        var markerSource = new ol.source.Vector();
        var markerLayer = new ol.layer.Vector({
            source: markerSource
        });
        map.addLayer(markerLayer);

        var marker = new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.fromLonLat([17.128647, 8.82]))
        });
        markerSource.addFeature(marker);

        // Handle click events on the map
        map.on('click', function (event) {
            var lonlat = ol.proj.transform(event.coordinate, 'EPSG:3857', 'EPSG:4326');
            document.getElementById('longitude').innerText = lonlat[0];
            document.getElementById('latitude').innerText = lonlat[1];
            @this.
            set('longitude', lonlat[0]);
            @this.
            set('latitude', lonlat[1]);

            marker.setGeometry(new ol.geom.Point(event.coordinate));
            // Trigger a re-render or update here
        });
    </script>
    <script>
        function previewImages() {
            var preview = document.querySelector('#preview');
            var files = document.querySelector('input[type=file]').files;

            preview.innerHTML = '';

            if (files) {
                for (var i = 0; i < files.length; i++) {
                    var reader = new FileReader();

                    reader.onload = function (event) {
                        var img = document.createElement('img');
                        img.src = event.target.result;
                        img.style.maxWidth = '200px';
                        img.style.marginRight = '10px';
                        preview.appendChild(img);
                    }

                    reader.readAsDataURL(files[i]);
                }
            }
        }
    </script>
</div>
