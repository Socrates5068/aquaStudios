<x-app-layout>
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

        @if ($order->status != 7)
            <div class="bg-white rounded-lg shadow-lg px-6 lg:px-12 py-8 mb-6 flex items-center">
                <div class="relative">
                    <div
                        class="{{ $order->status >= 2 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fab fa-amazon-pay text-white"></i>
                    </div>

                    <div class="absolute -left-2.5 mt-0.5 md:-left-3">
                        <p class="text-xs md:text-sm">Confirmado</p>
                    </div>
                </div>

                <div class="{{ $order->status >= 3 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-1"></div>

                <div class="relative">
                    <div
                        class="{{ $order->status >= 3 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-film {{ $order->status >= 3 ? 'text-white' : '' }}"></i>
                    </div>

                    <div class="absolute -left-0.6 mt-0.5 md:-left-1">
                        <p class="text-xs md:text-sm">Editando</p>
                    </div>
                </div>

                <div class="{{ $order->status >= 4 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-1"></div>

                <div class="relative">
                    <div
                        class="{{ $order->status >= 4 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-photo-video {{ $order->status >= 4 ? 'text-white' : '' }}"></i>
                    </div>
                    <div class="absolute -left-1 mt-0.5 md:-left-2">
                        <p class="text-xs md:text-sm">Terminado</p>
                    </div>
                </div>

                <div class="{{ $order->status >= 5 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-1"></div>

                <div class="relative">
                    <div
                        class="{{ $order->status >= 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-truck {{ $order->status >= 5 ? 'text-white' : '' }}"></i>
                    </div>
                    <div class="absolute left-1 mt-0.5 md:-left-0.5">
                        <p class="text-xs md:text-sm">Enviado</p>
                    </div>
                </div>

                <div class="{{ $order->status >= 6 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-1"></div>

                <div class="relative">
                    <div
                        class="{{ $order->status >= 6 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-compact-disc {{ $order->status >= 6 ? 'text-white' : '' }}"></i>
                    </div>
                    <div class="absolute -left-1 mt-0.5 md:-left-2 md:mt-0.5">
                        <p class="text-xs md:text-sm">Entregado</p>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-red-600 rounded-lg shadow-lg px-6 py-4 mb-6 items-center">
                <p class="text-center text-lg text-white font-bold">
                    ANULADO
                </p>
            </div>
            <div class="bg-white rounded-lg shadow-lg px-6 lg:px-12 py-8 mb-6 flex items-center">
                <div class="relative">
                    <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fab fa-amazon-pay text-white"></i>
                    </div>

                    <div class="absolute -left-2.5 mt-0.5 md:-left-3">
                        <p class="text-xs md:text-sm line-through">Confirmado</p>
                    </div>
                </div>

                <div class="bg-red-400 h-1 flex-1 mx-1"></div>

                <div class="relative">
                    <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-film {{ $order->status >= 3 ? 'text-white' : '' }}"></i>
                    </div>

                    <div class="absolute -left-0.6 mt-0.5 md:-left-1">
                        <p class="text-xs md:text-sm line-through">Editando</p>
                    </div>
                </div>

                <div class="bg-red-400 h-1 flex-1 mx-1"></div>

                <div class="relative">
                    <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-photo-video {{ $order->status >= 4 ? 'text-white' : '' }}"></i>
                    </div>
                    <div class="absolute -left-1 mt-0.5 md:-left-2">
                        <p class="text-xs md:text-sm line-through">Terminado</p>
                    </div>
                </div>

                <div class="bg-red-400 h-1 flex-1 mx-1"></div>

                <div class="relative">
                    <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-truck {{ $order->status >= 5 ? 'text-white' : '' }}"></i>
                    </div>
                    <div class="absolute left-1 mt-0.5 md:-left-0.5">
                        <p class="text-xs md:text-sm line-through">Enviado</p>
                    </div>
                </div>

                <div class="bg-red-400 h-1 flex-1 mx-1"></div>

                <div class="relative">
                    <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-compact-disc {{ $order->status >= 6 ? 'text-white' : '' }}"></i>
                    </div>
                    <div class="absolute -left-1 mt-0.5 md:-left-2 md:mt-0.5">
                        <p class="text-xs md:text-sm line-through">Entregado</p>
                    </div>
                </div>
            </div>
        @endif


        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <p class="text-sm md:text-base text-gray-700 uppercase"><span class="font-semibold">Número de reserva:</span>
                Reserva-{{ $order->id }}</p>
        </div>

        <div class="grid justify-items-stretch">
            <div class="justify-self-end">
                @if ($order->status == 1)

                    <x-button-enlace class="" href="{{ route('orders.payment', $order) }}">
                        Ir a pagar
                    </x-button-enlace>

                @endif

                @if ($order->status >= 2)

                    <x-button-enlace color="blue" class="justify-self-end" href="{{ route('edit.order', $order) }}">
                        Editar esta información
                    </x-button-enlace>

                @endif
            </div>
        </div>

        {{-- details of delivery --}}
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6 mt-6">
            <div class=" grid md:grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="text-sm md:text-base font-bold uppercase">Envío</p>
                    @if ($order->delivery_type == 1)
                        <p class="text-sm md:text-base">Esta reserva debe ser recogida en tienda.</p>
                    @else
                        <p class="text-sm md:text-base">Los productos serán enviados a </p>
                        <p class="text-sm md:text-base">{{ $order->d_address }}</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Event information --}}
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6 mt-6">
            <div class=" grid md:grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="text-sm md:text-base font-bold uppercase">Datos de contacto del evento</p>

                    <p class="text-sm md:text-base font-semibold">Persona encargada del evento: </p>
                    <p class="text-sm md:text-base">{{ $order->name_contact }}</p>
                    <p class="text-sm md:text-base font-semibold mt-4">Teléfono de contacto:</p>
                    <p class="text-sm md:text-base">{{ $order->phone_contact }}</p>
                </div>
                <div>
                    <p class="text-sm md:text-base font-bold uppercase">Invitación</p>
                    <div class="">
                        @if ($order->invitation)
                            <img src="{{ Storage::url($order->invitation) }}">
                        @endif
                    </div>
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
                            <p class="mt-3 text-sm md:text-base font-bold uppercase">Dirección principal del evento:</p>
                            {{ $address->address }}
                            @php
                                $con++;
                            @endphp
                        @else
                            <p class="mt-6 text-sm md:text-base font-bold uppercase">Dirección secundaria del evento:</p>
                            {{ $address->address }}
                        @endif
                    @endforeach
                </div>
                <div class="">
                    <x-dates-order>
                        @foreach ($order->datess as $date)
                            <tr
                                class="text-right bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800  border-b block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:relative absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">fecha</span>
                                    <input type="date" value="{{ $date->date }}">
                                </td>
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800  border-b block lg:table-cell relative lg:static">
                                    <span
                                        class="absolute lg:relative  top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">hora</span>
                                    {{ $date->time }}
                                </td>
                            </tr>
                        @endforeach
                    </x-dates-order>
                </div>
            </div>
        </div>

        {{-- Addreess information --}}
        @php
            $addresses = $order->addresses;
            $add = [];
            
            foreach ($addresses as $address) {
                array_push($add, $address);
            }
            
            $address1 = $add[0];
            $edit_address1 = $address1->address;
            $edit_lat1 = $address1->lat;
            $edit_lng1 = $address1->lng;
            $edit_address2 = null;
            
            if (isset($add[1])) {
                $address2 = $add[1];
                $edit_address2 = $address2->address;
                $edit_lat2 = $address2->lat;
                $edit_lng2 = $address2->lng;
            }
        @endphp
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6 mt-6">
            <div class=" grid md:grid-cols-2 gap-6 text-gray-700">
                <div>
                    {{-- Map address 1 --}}
                    <div class="mt-2 mb-6">
                        <div id='show_mapa1' class="h-80 mb-2"></div>
                        <input type="hidden" value="{{ $edit_lat1 }}" id="edit_lat1">
                        <input type="hidden" value="{{ $edit_lng1 }}" id="edit_lng1">
                    </div>
                </div>
                @if ($edit_address2)
                    <div>
                        {{-- Map address 2 --}}
                        <div class="mt-2 mb-6">
                            <div id='show_mapa2' class="h-80 mb-2"></div>
                            <input type="hidden" value="{{ $edit_lat2 }}" id="edit_lat2">
                            <input type="hidden" value="{{ $edit_lng2 }}" id="edit_lng2">
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- Comment --}}
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6 mt-6">
            <div class="flex mb-2">
                <p class="text-sm md:text-base font-semibold uppercase">Comentario adicional sobre el evento</p>
            </div>
            <div wire:ignore>
                <textarea class="w-full form-control" rows="4" readonly>{{$order->comment}}</textarea>
            </div>
        </div>

        {{-- Servide information --}}
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

        @if ($order->photos->count())
            <div class="grid justify-items-stretch px-6 py-4 mb-6">
                <div class="justify-self-end">
                    <x-button-enlace color="blue" class="justify-self-end" href="{{ route('photos', $order) }}">
                        Ver las fotos del evento
                    </x-button-enlace>
                </div>
            </div>
        @endif

    </div>
    @push('script')
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
                integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
                crossorigin=""></script>
        <script src="https://unpkg.com/esri-leaflet" defer></script>
        <script src="https://unpkg.com/esri-leaflet-geocoder" defer></script>
    @endpush
</x-app-layout>
