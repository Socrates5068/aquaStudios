<div>
    @push('style')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
            integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
            crossorigin="" />
        <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css" />
    @endpush

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-6">
            <div class="justify-self-start">
                <x-button-enlace color="blue" class="justify-self-end" href="javascript:history.back()">
                    Ir atrás
                </x-button-enlace>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Número de reserva:</span>
                Reserva-{{ $order->id }}</p>
        </div>

        {{-- Delivery informtation --}}
        @if (isset($order->d_address))
            <div class="bg-white rounded-lg shadow-lg p-6 mb-6 mt-6">
                <div class=" grid md:grid-cols-2 gap-6 text-gray-700">
                    <div>
                        <p class="font-semibold uppercase">Dirección de entrega</p>
                        <div class="mt-5">
                            <x-jet-input class="w-full" wire:model="address" type="text" />
                            <x-jet-input-error for="address" />
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Event information --}}
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6 mt-6">
            <div class=" grid md:grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="font-semibold uppercase">Datos de contacto del evento</p>

                    <x-jet-label value="Nombre" />
                    <x-jet-input class="w-full" wire:model="name_contact" type="text" />
                    <x-jet-input-error for="name_contact" />

                    <x-jet-label value="Telefono" class="mt-2" />
                    <x-jet-input class="w-full" wire:model="phone_contact" type="text" />
                    <x-jet-input-error for="phone_contact" />
                </div>
                <div>
                    <p class="font-semibold uppercase">Invitación</p>
                    <div class="">
                        @if ($order->invitation)
                            <x-jet-label value="Imagen actual" />
                            <img src="{{ Storage::url($order->invitation) }}">
                        @endif
                        <x-jet-input class="w-full mt-2" type="file" wire:model="invitation"
                            accept="image/png, image/gif, image/jpeg, image/jpg, image/bmp" />
                        <x-jet-input-error for="invitation" />
                    </div>
                </div>
            </div>
        </div>

        {{-- Addreess information --}}
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6 mt-6">
            <div class=" grid md:grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="font-semibold uppercase">Dirección principal</p>
                    <x-jet-input class="w-full" wire:model="edit_address1" type="text" />
                    <x-jet-input-error for="edit_address1" />

                    {{-- Map address 1 --}}
                    <div class="mt-2 mb-6">
                        <x-jet-label value="A continuación marque la ubicación aproximada en el mapa"
                            class="flex-1 text-center" />
                        <div id='edit_mapa1' class="h-80 mb-2" wire:ignore></div>
                        {{-- {{$lat}} {{$lng}} --}}
                        <input type="hidden" wire:model="edit_lat1" id="edit_lat1">
                        <x-jet-input-error for="lat" />
                        <input type="hidden" wire:model="edit_lng1" id="edit_lng1">
                    </div>
                </div>
                @if ($edit_address2)
                    <div>
                        <p class="font-semibold uppercase">Dirección secundaria</p>
                        <x-jet-input class="w-full" wire:model="edit_address2" type="text" />
                        <x-jet-input-error for="edit_address2" />

                        {{-- Map address 2 --}}
                        <div class="mt-2 mb-6">
                            <x-jet-label value="A continuación marque la ubicación aproximada en el mapa"
                                class="flex-1 text-center" />
                            <div id='edit_mapa2' class="h-80 mb-2" wire:ignore></div>
                            {{-- {{$lat}} {{$lng}} --}}
                            <input type="hidden" wire:model="edit_lat2" id="edit_lat2">
                            <x-jet-input-error for="lat" />
                            <input type="hidden" wire:model="edit_lng2" id="edit_lng2">
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- Comment --}}
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6 mt-6">
            <div class="flex mb-2">
                <p class="font-semibold uppercase">Comentario adicional sobre el evento (Opcional)</p>
            </div>
            <div wire:ignore>
                <textarea class="w-full form-control" rows="4"
                    wire:model.defer="comment">
                </textarea>
            </div>
            <x-jet-input-error for="comment" />
        </div>

        <div>
            <x-jet-button 
                wire:loading.attr="disabled" 
                wire:target="update_order"
                class="mt-6 mb-4"
                wire:click="update_order">
                Guardar
            </x-jet-button>
        </div>

    </div>
    @push('script')
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
                integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
                crossorigin=""></script>
        <script src="https://unpkg.com/esri-leaflet" defer></script>
        <script src="https://unpkg.com/esri-leaflet-geocoder" defer></script>
    @endpush
</div>
