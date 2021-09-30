<div>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
                Orden-{{ $order->id }}</p>
        </div>

        {{-- <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Actualizar estado</span></p>
        </div> --}}

        @if ($order->status != 7)
            <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-6 items-center lg:flex md:flex">

                <div class="relative">
                    <div
                        class="{{ $order->status >= 1 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-hourglass-end text-white cursor-pointer"
                        wire:click="updateState({{"1"}})"></i>
                    </div>

                    <div class="sm:absolute -left-3 mt-0.5">
                        <p class="text-sm">Pendiente</p>
                    </div>
                </div>

                <div class="{{ $order->status >= 2 ? 'bg-blue-400' : 'bg-gray-400' }} sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div
                        class="{{ $order->status >= 2 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fab fa-amazon-pay text-white cursor-pointer"
                        wire:click="updateState({{"2"}})"></i>
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
                            wire:click="updateState({{"3"}})"></i>
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
                            wire:click="updateState({{"4"}})"></i>
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
                            wire:click="updateState({{"5"}})"></i>
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
                            wire:click="updateState({{"6"}})"></i>
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
                            wire:click="updateState({{"7"}})"></i>
                    </div>
                    <div class="sm:absolute -left-2 mt-0.5">
                        <p class="text-sm">Anulado</p>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-red-600 rounded-lg shadow-lg px-6 py-4 mb-6 items-center lg:flex md:flex">
                <p class="text-center text-lg text-white font-bold">
                    ANULADO
                </p>
            </div>
            <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-6 items-center lg:flex md:flex">

                <div class="relative">
                    <div
                        class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-hourglass-end text-white cursor-pointer"
                        wire:click="updateState({{"1"}})"></i>
                    </div>

                    <div class="sm:absolute -left-3 mt-0.5">
                        <p class="text-sm">Pendiente</p>
                    </div>
                </div>

                <div class="bg-red-400 sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fab fa-amazon-pay text-white cursor-pointer"
                            wire:click="updateState({{"2"}})"></i>
                    </div>

                    <div class="sm:absolute -left-3 mt-0.5">
                        <p class="text-sm line-through">Confirmado</p>
                    </div>
                </div>

                <div class="bg-red-400 sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-film {{ $order->status >= 3 ? 'text-white' : '' }} cursor-pointer"
                            wire:click="updateState({{"3"}})"></i>
                    </div>

                    <div class="sm:absolute -left-1 mt-0.5">
                        <p class="text-sm line-through">Editando</p>
                    </div>
                </div>

                <div class="bg-red-400 sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-photo-video {{ $order->status >= 4 ? 'text-white' : '' }} cursor-pointer"
                            wire:click="updateState({{"4"}})"></i>
                    </div>
                    <div class="sm:absolute -left-2 mt-0.5">
                        <p class="text-sm line-through">Terminado</p>
                    </div>
                </div>

                <div class="bg-red-400 sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-truck {{ $order->status >= 5 ? 'text-white' : '' }} cursor-pointer"
                            wire:click="updateState({{"5"}})"></i>
                    </div>
                    <div class="sm:absolute mt-0.5">
                        <p class="text-sm line-through">Enviado</p>
                    </div>
                </div>

                <div class="bg-red-400 sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-compact-disc {{ $order->status >= 6 ? 'text-white' : '' }} cursor-pointer"
                            wire:click="updateState({{"6"}})"></i>
                    </div>
                    <div class="sm:absolute -left-2 mt-0.5">
                        <p class="text-sm line-through">Entregado</p>
                    </div>
                </div>

                <div class="bg-red-400 sm:h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-compact-disc {{ $order->status >= 7 ? 'text-white' : '' }} cursor-pointer"
                            wire:click="updateState({{"7"}})"></i>
                    </div>
                    <div class="sm:absolute -left-2 mt-0.5">
                        <p class="text-sm line-through">Anulado</p>
                    </div>
                </div>
            </div>
        @endif        

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class=" grid grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="text-lg font-semibold uppercase">Envío</p>
                    @if ($order->envio_type == 1)
                        <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                        <p class="text-sm">Calle número XX</p>
                    @else
                        <p class="text-sm">Los productos serán enviados a </p>
                        <p class="text-sm">{{ $order->d_address }}</p>
                    @endif
                </div>
                <div>
                    <p class="text-lg font-semibold uppercase">Datos de contacto</p>
                    <p class="text-sm">Persona que recivirá el producto: {{ $order->name_contact }}</p>
                    <p class="text-sm">Teléfono de contacto: {{ $order->phone_contact }}</p>
                </div>
            </div>
        </div>

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
                    @foreach ($items as $key => $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}"
                                        alt="">
                                    <article>
                                        <h1 class="font-bold">{{ $item->name }}</h1>
                                    </article>
                                </div>
                            </td>
                            <td class="text-center">
                                {{ $item->price }} BOB
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6" wire:ignore>
            <form action="{{ route('admin.orders.images', $order) }}" 
                method="POST" 
                class="dropzone"
                id="my-awesome-dropzone"></form>
        </div>

        @if($order->photos->count())
            <section class="bg-white shadow-xl rounded-lg p-6 mt-4">
                <h1 class="uppercase text-center font-semibold mb-2">Imagenes del evento</h1>
                <ul class="flex flex-wrap">
                    @foreach($order->photos as $photo)
                        @if ($photo->status == 1)
                            <li class="relative" wire:key="photo-{{$photo->id}}">
                                <img class="w-32 h-20 object-cover flex" src="{{ Storage::url($photo->route_image) }}" alt="">
                                <x-jet-danger-button class="absolute right-2 top-2"
                                    wire:click="deletePhoto({{$photo->id}})"
                                    wire:loading.attr="disabled"
                                    wire:target="deletePhoto({{$photo->id}})">
                                    x
                                </x-jet-danger-button>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </section>
        @endif

        @if($order->photos->count())
        <section class="bg-white shadow-xl rounded-lg p-6 mt-4">
            <h1 class="uppercase text-center font-semibold mb-2">Imagenes seleccionadas por el usuario</h1>
            <div class="grid justify-items-stretch px-6 py-4">
                <div class="justify-self-end">
                    <x-button-enlace color="blue" class="justify-self-end" href="{{ route('admin.orders.photos', $order) }}">
                        Descargar fotos
                    </x-button-enlace>
                </div>
            </div>
                <ul class="flex flex-wrap">
                    @foreach($order->photos as $photo)
                        @if ($photo->status == 2)
                            <li class="relative" wire:key="photo-{{$photo->id}}">
                                <img class="w-32 h-20 object-cover flex" src="{{ Storage::url($photo->route_image) }}" alt="">
                                <x-jet-danger-button class="absolute right-2 top-2"
                                    wire:click="deletePhoto({{$photo->id}})"
                                    wire:loading.attr="disabled"
                                    wire:target="deletePhoto({{$photo->id}})">
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
                    'X-CSRF-TOKEN' : "{{ csrf_token() }}"
                },
                dictDefaultMessage: "Arrastre una imagen",
                acceptedFiles: 'image/*',
                paramName: 'image', // The name that will be used to transfer the file
                maxFilesize: 3, // MB
                complete: function(image){
                    this.removeFile(image);
                },
                queuecomplete: function(){
                    Livewire.emit('refreshOrder')
                }
            };
        </script>
    @endpush
</div>
