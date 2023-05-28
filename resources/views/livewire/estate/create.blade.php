<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <x-steps steps="4" current="{{$step}}"></x-steps>
            <div class="max-w-full">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('create New Estate') }}
                        </h2>
                    </header>
                    <div class="mt-6 space-y-6">
                        <div class="{{ $step != 1 ? 'hidden' : '' }} max-w-xl">
                            <div>
                                <x-input-label for="type" :value="__('Estate Type')"/>

                                <x-select-input label="type" name="type"
                                                class="block mt-1 w-full" wire:model="type"
                                                :options="['House' => 'house','Land' => 'land', 'Flat' => 'flat']"/>
                                <x-input-error :messages="$errors->get('type')"
                                               class="mt-2"/>
                            </div>
                            <div>
                                <x-input-label for="address" :value="__('Estate Address')"/>
                                <x-text-input id="address" name="address" type="text" class="mt-1 block w-full"
                                              wire:model="address"
                                              autocomplete="address"/>
                                <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                            </div>
                            <div>
                                <x-input-label for="city" :value="__('Estate city')"/>
                                <x-select-input label="city" name="city" wire:model="city"
                                                class="block mt-1 w-full"
                                                :options="['Triploi' => 'Triploi','Athens' => 'Athens','Bangazi' => 'Bangazi', 'misrat' => 'misrat',]"/>
                                <x-input-error :messages="$errors->get('city')"
                                               class="mt-2"/>
                            </div>
                            <div>
                                <x-input-label for="country" :value="__('Estate country')"/>
                                <x-select-input label="country" name="country" wire:model="country"
                                                class="block mt-1 w-full"
                                                :options="['libya' => 'libya' ,'Egypt'=>'Egypt' ]"/>
                                <x-input-error :messages="$errors->get('country')"
                                               class="mt-2"/>
                            </div>
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
                            <div>
                                <x-input-label for="price" :value="__('Estate price')"/>
                                <x-text-input id="price" name="price" type="number" step="0.00001"
                                              class="mt-1 block w-full" wire:model="price"
                                              autocomplete="price"/>
                                <x-input-error :messages="$errors->get('price')"
                                               class="mt-2"/>
                            </div>

                        </div>
                        <div class="{{ $step != 2 ? 'hidden' : '' }}">
                            <div class="">
                                <div class="py-12">
                                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                                            <div class="flex flex-col">
                                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                    <div
                                                        class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                                        <div
                                                            class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                            <table class="min-w-full divide-y divide-gray-200">
                                                                <thead>
                                                                <tr>
                                                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('name')}}</th>
                                                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('select')}}</th>
                                                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('count')}}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody class="bg-white divide-y divide-gray-200">
                                                                @foreach($allUtilities as $allUtilitie)
                                                                    <tr>
                                                                        <td class="px-6 py-4 whitespace-no-wrap">
                                                                            <div class="flex items-center">
                                                                                <div>
                                                                                    <div
                                                                                        class="text-sm leading-5 font-medium text-gray-900">{{ $allUtilitie->name }}</div>
                                                                                </div>
                                                                            </div>
                                                                        </td>

                                                                        <td class="px-6 py-4 whitespace-no-wrap">
                                                                            <div
                                                                                class="text-sm leading-5 text-gray-900">
                                                                                <x-text-input type="checkbox"
                                                                                              wire:click="toggleUtility({{$allUtilitie->id}})"
                                                                                              value="1"/>
                                                                            </div>
                                                                        </td>

                                                                        <td class="px-6 py-4 whitespace-no-wrap">
                                                                            <div
                                                                                class="text-sm leading-5 text-gray-900">
                                                                                @if(isset($utilities[$allUtilitie->id]['quantity']))
                                                                                    <x-text-input type="number"
                                                                                                  wire:model.lazy="utilities.{{ $allUtilitie->id }}.quantity"
                                                                                                  value="{{$utilities[$allUtilitie->id]['quantity'] ?? 1}}"/>

                                                                                @else
                                                                                    <x-text-input type="number" disabled
                                                                                                  wire:model.lazy="utilities.{{ $allUtilitie->id }}.quantity"
                                                                                                  class="bg-gray-100"/>
                                                                                @endif
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                            <div
                                                                class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                                                {{-- {{ $attendances->links() }} --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="{{ $step != 3 ? 'hidden' : '' }}">
                            <div class="" wire:ignore>

                                <div id="map" style="width:100%; height:400px;"></div>

                                <p>Longitude: <span id="longitude"></span></p>
                                <p>Latitude: <span id="latitude"></span></p>
                            </div>


                        </div>
                        <div class="{{ $step != 4 ? 'hidden' : '' }}">
                            <div class="" wire:ignore>

                                <div class="mb-4">
                                    <label for="images" class="block font-medium text-gray-700">Estate Images</label>
                                    <x-text-input accept="image/jpg, image/png, image/jpeg" name="images[]" id="images"
                                                  multiple wire:model="images" onchange="previewImages()"
                                                  class="block w-full text-sm text-gray-900 border border-gray-700 rounded-lg cursor-pointer bg-gray-50 focus:outline-none "
                                                  type='file'/>
                                </div>


                                <div id="preview" class="flex justify-center items-center gap-4 flex-wrap"></div>


                            </div>


                        </div>


                        <div class="flex items-center justify-between flex-row-reverse gap-4">
                            @if($step != 4)
                                <x-primary-button wire:click="nextStep" disabled="{{ $step == 4 }}"
                                                  type="button">{{ __('Next') }}</x-primary-button>
                                <x-primary-button wire:click="previousStep" disabled="{{ $step == 1 }}"
                                                  type="button">{{ __('prev') }}</x-primary-button>
                            @else
                                <x-primary-button wire:click="submit" type="button">{{ __('Submit') }}</x-primary-button>

                            @endif

                        </div>

                    </div>

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
