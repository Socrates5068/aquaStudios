<div>
    @push('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css" />
    @endpush

    {{-- Update state --}}
    <div wire:loading.delay wire:target="updateState" class="w-full h-full fixed block top-0 left-0 bg-white opacity-75 z-50 text-center">
        <span class="text-green-500 opacity-75 top-1/2 -mt-24 mb-2 mx-auto block relative" style="top: 50%;">
            <i class="fas fa-circle-notch fa-spin fa-5x"></i>
        </span>
        <p class="text-2xl text-green-500 top-1/2 block relative">Actualizando estado, espere por favor...</p>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Número de reserva:</span>
                Reserva-{{ $order->id }}</p>
        </div>

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Actualizar estado</span></p>
        </div>

        {{-- Show order state --}}
        @if ($order->status != 7)
            <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-6 items-center lg:flex md:flex">

                <div class="relative">
                    <div
                        class="{{ $order->status >= 1 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-hourglass-end text-white cursor-pointer"
                            wire:click="updateState({{ '1' }})"></i>
                    </div>

                    <div class="sm:absolute -left-2 mt-0.5">
                        <p class="text-sm">Pendiente</p>
                    </div>
                </div>

                <div class="{{ $order->status >= 2 ? 'bg-blue-400' : 'bg-gray-400' }} sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div
                        class="{{ $order->status >= 2 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fab fa-amazon-pay text-white cursor-pointer"
                            wire:click="updateState({{ '2' }})"></i>
                    </div>

                    <div class="sm:absolute -left-3 mt-0.5">
                        <p class="text-sm">Confirmado</p>
                    </div>
                </div>

                <div class="{{ $order->status >= 3 ? 'bg-blue-400' : 'bg-gray-400' }} sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div
                        class="{{ $order->status >= 3 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-film {{ $order->status >= 3 ? 'text-white' : '' }} cursor-pointer"
                            wire:click="updateState({{ '3' }})"></i>
                    </div>

                    <div class="sm:absolute -left-1 mt-0.5">
                        <p class="text-sm">Editando</p>
                    </div>
                </div>

                <div class="{{ $order->status >= 4 ? 'bg-blue-400' : 'bg-gray-400' }} sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div
                        class="{{ $order->status >= 4 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-photo-video {{ $order->status >= 4 ? 'text-white' : '' }} cursor-pointer"
                            wire:click="updateState({{ '4' }})"></i>
                    </div>
                    <div class="sm:absolute -left-2 mt-0.5">
                        <p class="text-sm">Terminado</p>
                    </div>
                </div>

                <div class="{{ $order->status >= 5 ? 'bg-blue-400' : 'bg-gray-400' }} sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div
                        class="{{ $order->status >= 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-truck {{ $order->status >= 5 ? 'text-white' : '' }} cursor-pointer"
                            wire:click="updateState({{ '5' }})"></i>
                    </div>
                    <div class="sm:absolute mt-0.5">
                        <p class="text-sm">Enviado</p>
                    </div>
                </div>

                <div class="{{ $order->status >= 6 ? 'bg-blue-400' : 'bg-gray-400' }} sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div
                        class="{{ $order->status >= 6 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-compact-disc {{ $order->status >= 6 ? 'text-white' : '' }} cursor-pointer"
                            wire:click="updateState({{ '6' }})"></i>
                    </div>
                    <div class="sm:absolute -left-2 mt-0.5">
                        <p class="text-sm">Entregado</p>
                    </div>
                </div>

                <div class="{{ $order->status >= 7 ? 'bg-blue-400' : 'bg-gray-400' }} sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div
                        class="{{ $order->status >= 7 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-times-circle {{ $order->status >= 7 ? 'text-white' : '' }} cursor-pointer"
                            wire:click="updateState({{ '7' }})"></i>
                    </div>
                    <div class="sm:absolute -left-2 mt-0.5">
                        <p class="text-sm">Anulado</p>
                    </div>
                </div>
            </div>
            <div class="grid justify-items-stretch">
                <div class="justify-self-end">
                    <x-button-enlace color="blue" class="text-center" href="{{ $whatsApp }}" target="_blank">
                        notificar al usuario por WhatApp
                    </x-button-enlace>
                </div>
            </div>
        @else
            <div class="bg-red-600 rounded-lg shadow-lg px-6 py-4 mb-6 items-center lg:flex md:flex">
                <p class="text-center text-lg text-white font-bold">
                    ANULADO
                </p>
            </div>
            <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-6 items-center lg:flex md:flex">

                <div class="md:relative">
                    <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-hourglass-end text-white cursor-pointer"
                            wire:click="updateState({{ '1' }})"></i>
                    </div>

                    <div class="sm:absolute -left-2 mt-0.5">
                        <p class="text-sm line-through">Pendiente</p>
                    </div>
                </div>

                <div class="bg-red-400 sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fab fa-amazon-pay text-white cursor-pointer"
                            wire:click="updateState({{ '2' }})"></i>
                    </div>

                    <div class="sm:absolute -left-3 mt-0.5">
                        <p class="text-sm line-through">Confirmado</p>
                    </div>
                </div>

                <div class="bg-red-400 sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-film {{ $order->status >= 3 ? 'text-white' : '' }} cursor-pointer"
                            wire:click="updateState({{ '3' }})"></i>
                    </div>

                    <div class="sm:absolute -left-1 mt-0.5">
                        <p class="text-sm line-through">Editando</p>
                    </div>
                </div>

                <div class="bg-red-400 sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-photo-video {{ $order->status >= 4 ? 'text-white' : '' }} cursor-pointer"
                            wire:click="updateState({{ '4' }})"></i>
                    </div>
                    <div class="sm:absolute -left-2 mt-0.5">
                        <p class="text-sm line-through">Terminado</p>
                    </div>
                </div>

                <div class="bg-red-400 sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-truck {{ $order->status >= 5 ? 'text-white' : '' }} cursor-pointer"
                            wire:click="updateState({{ '5' }})"></i>
                    </div>
                    <div class="sm:absolute mt-0.5">
                        <p class="text-sm line-through">Enviado</p>
                    </div>
                </div>

                <div class="bg-red-400 sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-compact-disc {{ $order->status >= 6 ? 'text-white' : '' }} cursor-pointer"
                            wire:click="updateState({{ '6' }})"></i>
                    </div>
                    <div class="sm:absolute -left-2 mt-0.5">
                        <p class="text-sm line-through">Entregado</p>
                    </div>
                </div>

                <div class="bg-red-400 sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-compact-disc {{ $order->status >= 7 ? 'text-white' : '' }} cursor-pointer"
                            wire:click="updateState({{ '7' }})"></i>
                    </div>
                    <div class="sm:absolute -left-2 mt-0.5">
                        <p class="text-sm line-through">Anulado</p>
                    </div>
                </div>
            </div>
            <div class="grid justify-items-stretch">
                <div class="justify-self-end">
                    <x-button-enlace color="red" class="text-center" href="{{ $whatsApp }}" target="_blank">
                        notificar al usuario por WhatApp
                    </x-button-enlace>
                </div>
            </div>
        @endif

        {{-- details of delivery --}}
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6 mt-6">
            <div class=" grid md:grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="font-bold uppercase">Envío</p>
                    @if ($order->delivery_type == 1)
                        <p class="text-sm">Esta reserva debe ser recogida en tienda.</p>
                    @else
                        <p class="text-sm">Los productos serán enviados a </p>
                        <p class="text-sm">{{ $order->d_address }}</p>
                    @endif
                </div>
                <div>
                    <p class="font-bold uppercase">Datos de contacto del evento</p>
                    <p class="md:text-sm">Persona encargada del evento: {{ $order->name_contact }}</p>
                    <p class="md:text-sm">Teléfono de contacto: {{ $order->phone_contact }}</p>
                </div>
            </div>
        </div>

        {{-- details of the user --}}
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6 mt-6">
            <div class="grid md:grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="font-bold uppercase">Usuario de esta reserva</p>
                    <p class="text-sm">Nombre: {{ $order->user->name }}</p>

                </div>
                <div>
                    <p class="font-bold uppercase">Datos de contacto</p>
                    <p class="text-sm">Correo: {{ $order->user->email }}</p>
                    <p class="text-sm">Teléfono: {{ $order->user->celphone }}</p>
                </div>
            </div>
        </div>

        {{-- details of the event --}}
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6 mt-6">
            <div class="grid md:grid-cols-2 gap-6 text-gray-700">
                <div>
                    @php
                        $con = 1;
                    @endphp
                    @foreach ($order->addresses as $address)
                        
                        @if ($con === 1)
                            <p class="mt-3 md:text-sm font-bold uppercase">Dirección principal del evento:</p>
                            {{ $address->address }}
                            @php
                                $con++;
                            @endphp
                        @else
                            <p class="mt-6 md:text-sm font-bold uppercase">Dirección secundaria del evento:</p>
                            {{ $address->address }}
                        @endif
                    @endforeach
                </div>
                <div class="">
                    <x-dates-order>
                        @foreach ($order->datess as $date)
                            <tr class="text-right bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                <td class="w-full lg:w-auto p-3 text-gray-800 border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:relative absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">fecha</span>
                                    <input type="date" value="{{ $date->date }}">
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 border border-b block lg:table-cell relative lg:static">
                                    <span class="absolute lg:relative  top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">hora</span>
                                    {{ $date->time }}
                                </td>
                            </tr>
                        @endforeach
                    </x-dates-order>
                </div>
            </div>
        </div>

        {{-- Map --}}
        <div id="coordinates" class="bg-white rounded-lg shadow-lg p-6 mb-6 mt-6">
            @if ($addresses === 0)
            <select name="select-location" id="select-location">
                <option value="-1">Seleccione una ubicación</option>
                <option value="{{$coordinates[0].','.$coordinates[1]}}"> Dirección principal del evento</option>
            </select>
            <div id='mapStatic' class="mt-4 h-80 mb-2" wire:ignore></div>
            @else
                <select name="select-location" id="select-location">
                    <option value="-1">Seleccione una ubicación</option>
                    <option value="{{$coordinates[0].','.$coordinates[1]}}"> Dirección principal del evento</option>
                    <option value="{{$coordinates[2].','.$coordinates[3]}}"> Dirección principal del evento</option>
                </select>
                <div id='mapStatic' class="mt-4 h-80 mb-2" wire:ignore></div>
            @endif
        </div>

        {{-- Summary of order --}}
        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
            <p class="text-xl font-semibold mb-4">Resumen</p>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td>
                            <div class="flex">
                                <img class="h-15 w-20 object-cover mr-4" src="{{ Storage::url($service->image) }}"
                                    alt="">
                                <article>
                                    <h1 class="font-bold">{{ $service->name }}</h1>
                                </article>
                            </div>
                        </td>
                        <td class="text-center">
                            {{ $order->total }} BOB
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        {{-- Upload images of the event --}}
        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6" wire:ignore>
            <p class="text-xl font-semibold mb-4">Subir imagenes del evento</p>
            <form action="{{ route('admin.orders.images', $order) }}" method="POST" class="dropzone"
                id="my-awesome-dropzone"></form>
        </div>

        {{-- Show uploaded images --}}
        @if ($order->photos->count())
            <section class="bg-white shadow-xl rounded-lg p-6 mt-4">
                <h1 class="uppercase text-center font-semibold mb-2">Imagenes del evento</h1>
                <ul class="flex flex-wrap">
                    @foreach ($order->photos as $photo)
                        @if ($photo->status == 1)
                            <li class="relative" wire:key="photo-{{ $photo->id }}">
                                <img class="w-32 h-20 object-cover flex"
                                    src="{{ Storage::url($photo->route_image) }}" alt="">
                                <x-jet-danger-button class="absolute right-2 top-2"
                                    wire:click="deletePhoto({{ $photo->id }})" wire:loading.attr="disabled"
                                    wire:target="deletePhoto({{ $photo->id }})">
                                    x
                                </x-jet-danger-button>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </section>
        @endif

        {{-- Images selected by user --}}
        @php
            $con = 0;
            foreach ($order->photos as $item) {
                if ($item->status == 2) {
                    $con++;
                }
            }
        @endphp
        @if ($con != 0)
            <section class="bg-white shadow-xl rounded-lg p-6 mt-4">
                <h1 class="uppercase text-center font-semibold mb-2">Imagenes seleccionadas por el usuario</h1>
                <div class="grid justify-items-stretch px-6 py-4">
                    <div class="justify-self-end">
                        <x-button-enlace color="blue" class="justify-self-end"
                            href="{{ route('admin.orders.photos', $order) }}">
                            <svg class="fill-current w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                            </svg>
                            Descargar fotos
                        </x-button-enlace>
                    </div>
                </div>
                <ul class="flex flex-wrap">
                    @foreach ($order->photos as $photo)
                        @if ($photo->status == 2)
                            <li class="relative" wire:key="photo-{{ $photo->id }}">
                                <img class="w-32 h-20 object-cover flex"
                                    src="{{ Storage::url($photo->route_image) }}" alt="">
                                <x-jet-danger-button class="absolute right-2 top-2"
                                    wire:click="deletePhoto({{ $photo->id }})" wire:loading.attr="disabled"
                                    wire:target="deletePhoto({{ $photo->id }})">
                                    x
                                </x-jet-danger-button>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </section>
        @endif
    </div>

    @push('script')
        <script>
            Dropzone.options.myAwesomeDropzone = { // camelized version of the `id`
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictDefaultMessage: "Arrastre una imagen",
                acceptedFiles: 'image/*',
                paramName: 'image', // The name that will be used to transfer the file
                maxFilesize: 3, // MB
                complete: function(image) {
                    this.removeFile(image);
                },
                queuecomplete: function() {
                    Livewire.emit('refreshOrder')
                }
            };
        </script>

        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
        <script src="https://unpkg.com/esri-leaflet" defer></script>
        <script src="https://unpkg.com/esri-leaflet-geocoder" defer></script>
    @endpush
</div>
