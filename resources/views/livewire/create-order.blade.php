@push('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css" />
@endpush

<div class="container py-8 grid-cols-1 sm:grid lg:grid-cols-2 xl:grid-cols-5 gap-6">
    {{-- Service information --}}
    <div class="order-1 lg:order-2 lg:col-span-1 xl:col-span-2">
        <div class="bg-white rounded-lg shadow p-6">
            <ul>
                @if ($service)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-center mr-4" src="{{ Storage::url($service->image) }}" alt="">
                        <article class="flex-1">
                            <h1 class="text-sm md:text-base font-bold">{{ $service->name }}</h1>
                            <p class="text-sm md:text-base">USD: {{ $service->price }}</p>
                        </article>
                    </li>
                @else
                    <li class="py-6 px-4">
                        <p class="text-sm md:text-base text-center text-gray-700">
                            No tiene agregado ningún itemen el carrito
                        </p>
                    </li>
                @endif
            </ul>

            <div class="text-gray-700">
                <p class=" flex justify-between items-center">
                    {{ $service->description }}
                </p>
            </div>

            <hr class="mt-4 mb-3">
            <div class="text-gray-700">
                <p class="text-sm md:text-base flex justify-between items-center">
                    Envio
                    <span class="font-semibold">
                        @if ($delivery_type == 1)
                            Gratis
                        @else
                            {{ $shipping_cost }} BOB
                        @endif
                    </span>
                </p>
                <hr class="mt-4 mb-3">
                <p class=" flex justify-between items-center font-semibold">
                    <span class="text-lg">Total</span>
                    @if ($delivery_type == 1)
                        {{ $service->price }} BOB
                    @else
                        {{ $service->price + $shipping_cost }} BOB
                    @endif
                </p>
            </div>
        </div>
    </div>
    
    {{-- Order information --}}
    <div class="order-2 lg:order-1 lg:col-span-1 xl:col-span-3">

        {{-- Delivery options --}}
        <div x-data="{delivery_type: @entangle('delivery_type')}" class="mb-4">
            <p class="mt-4 text-sm md:text-basemt-4 md:mt-0 mb-3 text-gray-700 font-semibold uppercase">Envio</p>

            <label class="bg-white rounded-lg shadow px-6 py-4 flex items-center mb-4 cursor-pointer">
                <input x-model="delivery_type" type="radio" value="1" name="delivery_type" class="text-gray-600">
                <span class="text-sm md:text-base ml-2 text-gray-700">Recoger en tienda</span>
                <span class="text-sm md:text-base font-semibold text-gray-700 ml-auto">Gratis</span>
            </label>

            <div class="bg-white rounded-lg shadow">
                <label class="px-6 py-4 flex items-center cursor-pointer">
                    <input x-model="delivery_type" type="radio" value="2" name="delivery_type" class="text-gray-600" />
                    <span class="text-sm md:text-base ml-2 text-gray-700">
                        Envío a domicilio
                    </span>
                </label>
                {{-- address for delivery --}}
                <div class="px-6 pb-6 hidden" :class="{ 'hidden': delivery_type != 2 }">
                    <div>
                        <x-jet-label value="Dirección" />
                        <x-jet-input class="w-full" wire:model="address" type="text" />
                        <x-jet-input-error for="address" />
                    </div>
                </div>
            </div>
        </div>

        {{-- information for delivery --}}
        <div class="bg-white rounded-lg shadow p-6">
            <p class="text-sm md:text-base text-gray-700 font-semibold uppercase mb-4 -mt-2">Información de contacto</p>
            <div class="mb-4">
                <x-jet-label value="Nombre de contacto" />
                <x-jet-input type="text" wire:model.defer="contact" placeholder="Ingrese el nombre de contacto"
                    class="w-full" />
                <x-jet-input-error for="contact" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Telefeno de contacto" />
                <x-jet-input type="text" wire:model.defer="phone" placeholder="Ingrese un número de contacto"
                    class="w-full" />
                <x-jet-input-error for="phone" />
            </div>
        </div>

        {{-- Order details --}}
        <div class="bg-white rounded-lg shadow p-6 mt-4">
            <p class="text-sm md:text-base text-gray-700 font-semibold uppercase mb-4 -mt-2">Detalles del evento</p>

            {{-- Upload image --}}
            <div class="mb-6">
                <div class="flex">
                    <x-jet-label value="Invitación (Opcional)" />
                </div>
                <div class="flex items-center justify-center w-full">
                    <label
                        class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">
                        <div class="flex flex-col items-center justify-center pt-7">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-12 h-12 text-gray-400 group-hover:text-gray-600" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                Selecciona una foto</p>
                        </div>
                        <input wire:model.defer="invitation" type="file" class="opacity-0" 
                            accept="image/png, image/gif, image/jpeg, image/jpg, image/bmp" />
                    </label>
                </div>
                <x-jet-input-error for="invitation" />
            </div>

            <hr class="mt-4 mb-3">

            {{-- Map address 1 --}}
            <div class="mb-6">
                <x-jet-label value="Dirección principal del evento" class="" />
                <x-jet-input type="text" wire:model.defer="address_1" 
                            placeholder="Ej. Calle Hoyos Nº. 50, Zona central"
                            class="w-full mb-3" />
                <x-jet-input-error for="address_1" />
                
                <x-jet-label value="A continuación marque la ubicación aproximada en el mapa" class="flex-1 text-center" />
                <div id='mapa' class="h-80 mb-2" wire:ignore></div>
                {{-- {{$lat}} {{$lng}} --}}
                <input type="hidden" wire:model="lat" id="lat">
                <x-jet-input-error for="lat" />
                <input type="hidden" wire:model="lng" id="lng">

                <x-jet-label value="Seleccione una fecha y una hora" class="mb-2 mt-6" />
                <div class="mb-6 flex-1">
                    <x-jet-input type="date" wire:model.defer="dates.date" 
                                placeholder="Ej. Calle Hoyos Nº. 50, Zona central"
                                class="mb-3" />
                    <x-jet-input-error for="dates.date" />

                    <x-jet-input type="time" wire:model.defer="dates.time" 
                                placeholder="Ej. Calle Hoyos Nº. 50, Zona central"
                                class="mb-3" />
                    <x-jet-input-error for="dates.time" />
                    {{-- Modal --}}
                    <div x-data="{open: @entangle('modal').defer}" 
                        x-init="setTimeout(() => {open = false }, 3000)" 
                        x-show="open" x-transition:enter="transition duration-500 transform ease-out" 
                        x-transition:enter-start="opacity-1"
                        x-transition:leave="transition durantion-500 transform ease-in" 
                        x-transition:leave-end="opacity-0" 
                        class="flex items-center p-2 mb-4 text-white bg-red-600 rounded">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    
                        <span class="text-sm md:text-base px-2">
                            {{"Esta fecha ya se encuentra reservada."}}
                        </span>
                    
                    </div>
                </div>
            </div>
            
            {{-- Map address 2 --}}
            <div x-data="{address_state: @entangle('address_state')}" class="mb-6">
                <div >
                    <x-button-enlace color="blue" wire:click="addressType({{ $address_state }})" id="size" class="cursor-pointer">
                        @if ($address_state == 1)
                            Añadir otra dirección  
                        @else
                            Quitar dirección
                        @endif
                    </x-button-enlace>

                    <div class="hidden" :class="{ 'hidden': address_state != 2 }">
                        <x-jet-label class="mt-4" value="Dirección secundaria" />
                        <x-jet-input type="text" wire:model.defer="address_2" 
                                    placeholder="Ej. Ceremonia religiosa en la iglesia de la merced"
                                    class="w-full mb-3" />
                        <x-jet-input-error for="address_2" />

                        
                        <x-jet-label value="A continuación marque la ubicación aproximada en el mapa" class="flex-1 text-center" />
                        <div id='mapa2' class="h-80" wire:ignore></div>
                        {{-- {{$lat1}} {{$lng1}} --}}
                        <input type="hidden" wire:model="lat1" id="lat1">
                        <x-jet-input-error for="lat1" />

                        <x-jet-label value="Seleccione una fecha y una hora" class="mb-2" />
                        <div class="mb-6 flex-1">
                            <x-jet-input type="date" wire:model.defer="dates.date1" 
                                        placeholder="Ej. Calle Hoyos Nº. 50, Zona central"
                                        class="mb-3" />
                            <x-jet-input-error for="dates.date1" />

                            <x-jet-input type="time" wire:model.defer="dates.time1" 
                                        placeholder="Ej. Calle Hoyos Nº. 50, Zona central"
                                        class="mb-3" />
                            <x-jet-input-error for="dates.time1" />

                            {{-- Modal --}}
                            <div x-data="{open1: @entangle('modal1')}" 
                                x-init="setTimeout(() => {open1 = false }, 3000)" 
                                x-show="open1" x-transition:enter="transition duration-500 transform ease-out" 
                                x-transition:enter-start="opacity-1"
                                x-transition:leave="transition durantion-500 transform ease-in" 
                                transition:leave-end="opacity-0" 
                                class="flex items-center p-2 mb-4 text-white bg-red-600 rounded">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                
                                    <span class="text-sm md:text-base px-2" id="scheduleError">
                                        {{"Esta fecha ya se encuentra reservada."}}
                                    </span>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-4 mb-3">

            {{-- Comment --}}
            <div class="mb-6">
                <div class="flex mb-2">
                    <x-jet-label value="Comentario adicional sobre el evento (Opcional)" />
                </div>
                <div wire:ignore>
                    <textarea class="w-full form-control" rows="4"
                        wire:model.defer="comment">
                    </textarea>
                </div>
                <x-jet-input-error for="comment" />
            </div>

        </div>

        {{-- Button form --}}
        <div>
            <x-jet-button 
                wire:loading.attr="disabled" 
                wire:target="create_order" 
                class="mt-6 mb-4"
                wire:click="$emit('createOrder', 'dodo')">
                Continuar con la compra
            </x-jet-button>

            <hr>
            <p class="text-sm text-gray-700 mt-2 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Amet, deserunt consequatur voluptatibus porro eligendi reprehenderit corporis quia autem. Dicta, ratione
                iusto. Consectetur unde et rerum laborum ullam repellendus aspernatur dignissimos. <a
                    class="font-semibold text-red-500" href="">Proliticas y privacidad</a> </p>
        </div>
        

    </div>

    

</div>
@push('script')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="https://unpkg.com/esri-leaflet" defer></script>
    <script src="https://unpkg.com/esri-leaflet-geocoder" defer></script>
    <script>
        Livewire.on('createOrder', service => {
        
            Swal.fire({
                title: '¿Está seguro de que los datos son correctos?',
                text: "¡Las fechas que va a reservar no se pueden modificar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, quiero pagar ya!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //Livewire.emitTo('admin.create-category', 'delete', categoryId)
                    Livewire.emit('create_order')
                }
            })
        });
    </script>
@endpush
