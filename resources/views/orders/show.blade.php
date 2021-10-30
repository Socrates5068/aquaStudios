<x-app-layout>
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
                    <div class="{{ ($order->status >=2) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fab fa-amazon-pay text-white"></i>
                    </div>      
                    
                    <div class="absolute -left-2.5 mt-0.5 md:-left-3">
                        <p class="text-xs md:text-sm">Confirmado</p>
                    </div>
                </div>

                <div class="{{ ($order->status >=3) ? 'bg-blue-400' : 'bg-gray-400'}} h-1 flex-1 mx-1"></div>

                <div class="relative">
                    <div class="{{ ($order->status >=3) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-film {{ ($order->status >=3) ? 'text-white' : ''}}"></i>
                    </div>    
                    
                    <div class="absolute -left-0.6 mt-0.5 md:-left-1">
                        <p class="text-xs md:text-sm">Editando</p>
                    </div>
                </div>

                <div class="{{ ($order->status >=4) ? 'bg-blue-400' : 'bg-gray-400'}} h-1 flex-1 mx-1"></div>

                <div class="relative">
                    <div class="{{ ($order->status >=4) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-photo-video {{ ($order->status >=4) ? 'text-white' : ''}}"></i>
                    </div>
                    <div class="absolute -left-1 mt-0.5 md:-left-2">
                        <p class="text-xs md:text-sm">Terminado</p>
                    </div>                              
                </div>

                <div class="{{ ($order->status >=5) ? 'bg-blue-400' : 'bg-gray-400'}} h-1 flex-1 mx-1"></div>

                <div class="relative">
                    <div class="{{ ($order->status >=5) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-truck {{ ($order->status >=5) ? 'text-white' : ''}}"></i>
                    </div>
                    <div class="absolute left-1 mt-0.5 md:-left-0.5">
                        <p class="text-xs md:text-sm">Enviado</p>
                    </div>                              
                </div>

                <div class="{{ ($order->status >=6) ? 'bg-blue-400' : 'bg-gray-400'}} h-1 flex-1 mx-1"></div>

                <div class="relative">
                    <div class="{{ ($order->status >=6) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-compact-disc {{ ($order->status >=6) ? 'text-white' : ''}}"></i>
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
                            <i class="fas fa-film {{ ($order->status >=3) ? 'text-white' : ''}}"></i>
                        </div>    
                        
                        <div class="absolute -left-0.6 mt-0.5 md:-left-1">
                            <p class="text-xs md:text-sm line-through">Editando</p>
                        </div>
                    </div>

                    <div class="bg-red-400 h-1 flex-1 mx-1"></div>

                    <div class="relative">
                        <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                            <i class="fas fa-photo-video {{ ($order->status >=4) ? 'text-white' : ''}}"></i>
                        </div>
                        <div class="absolute -left-1 mt-0.5 md:-left-2">
                            <p class="text-xs md:text-sm line-through">Terminado</p>
                        </div>                              
                    </div>

                    <div class="bg-red-400 h-1 flex-1 mx-1"></div>

                    <div class="relative">
                        <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                            <i class="fas fa-truck {{ ($order->status >=5) ? 'text-white' : ''}}"></i>
                        </div>
                        <div class="absolute left-1 mt-0.5 md:-left-0.5">
                            <p class="text-xs md:text-sm line-through">Enviado</p>
                        </div>                              
                    </div>

                    <div class="bg-red-400 h-1 flex-1 mx-1"></div>

                    <div class="relative">
                        <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                            <i class="fas fa-compact-disc {{ ($order->status >=6) ? 'text-white' : ''}}"></i>
                        </div>
                        <div class="absolute -left-1 mt-0.5 md:-left-2 md:mt-0.5">
                            <p class="text-xs md:text-sm line-through">Entregado</p>
                        </div>                              
                    </div>
            </div>
        @endif
        

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Número de reserva:</span>
                Reserva-{{ $order->id }}</p>

            @if ($order->status == 1)
            
                <x-button-enlace class="ml-auto" href="{{route('orders.payment', $order)}}">
                    Ir a pagar
                </x-button-enlace>

            @endif
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class=" grid grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="text-lg font-semibold uppercase">Envío</p>
                    @if ($order->delivery_type == 1)
                        <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                        <p class="text-sm">Calle número XX</p>
                    @else
                        <p class="text-sm">Los productos serán enviados a </p>
                        <p class="text-sm">{{$order->d_address}}</p>
                    @endif
                </div>
                <div>
                    <p class="text-lg font-semibold uppercase">Datos de contacto</p>
                    <p class="text-sm">Persona que recivirá el producto: {{$order->name_contact}}</p>
                    <p class="text-sm">Teléfono de contacto: {{$order->phone_contact}}</p>
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
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" 
                                        src="{{ Storage::url($order->service->image) }}" alt="">
                                    <article>
                                        <h1 class="font-bold">{{$order->service->name}}</h1>
                                    </article>
                                </div>
                            </td>
                            <td class="text-center">
                                {{$order->total}} BOB
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
</x-app-layout>