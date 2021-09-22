<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if ($order->status != 7)
            <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-6 flex items-center">
                <div class="relative">
                    <div class="{{ ($order->status >=2) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-check text-white"></i>
                    </div>      
                    
                    <div class="absolute -left-3 mt-0.5">
                        <p class="text-sm">Confirmado</p>
                    </div>
                </div>

                <div class="{{ ($order->status >=3) ? 'bg-blue-400' : 'bg-gray-400'}} h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div class="{{ ($order->status >=3) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-film {{ ($order->status >=3) ? 'text-white' : ''}}"></i>
                    </div>    
                    
                    <div class="absolute -left-1 mt-0.5">
                        <p class="text-sm">Editando</p>
                    </div>
                </div>

                <div class="{{ ($order->status >=4) ? 'bg-blue-400' : 'bg-gray-400'}} h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div class="{{ ($order->status >=4) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-photo-video {{ ($order->status >=4) ? 'text-white' : ''}}"></i>
                    </div>
                    <div class="absolute -left-2 mt-0.5">
                        <p class="text-sm">Terminado</p>
                    </div>                              
                </div>

                <div class="{{ ($order->status >=5) ? 'bg-blue-400' : 'bg-gray-400'}} h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div class="{{ ($order->status >=5) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-truck {{ ($order->status >=5) ? 'text-white' : ''}}"></i>
                    </div>
                    <div class="absolute mt-0.5">
                        <p class="text-sm">Enviado</p>
                    </div>                              
                </div>

                <div class="{{ ($order->status >=6) ? 'bg-blue-400' : 'bg-gray-400'}} h-1 flex-1 mx-2"></div>

                <div class="relative">
                    <div class="{{ ($order->status >=6) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12  flex items-center justify-center">
                        <i class="fas fa-compact-disc {{ ($order->status >=6) ? 'text-white' : ''}}"></i>
                    </div>
                    <div class="absolute -left-2 mt-0.5">
                        <p class="text-sm">Entregado</p>
                    </div>                              
                </div>
            </div>
        @else
            <div class="bg-red-600 rounded-lg shadow-lg px-6 py-4 mb-6 items-center">
                <p class="text-center text-lg text-white font-bold">
                    ANULADO
                </p>
            </div>
                <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-6 flex items-center">
                    <div class="relative">
                        <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                            <i class="fas fa-check text-white"></i>
                        </div>      
                        
                        <div class="absolute -left-3 mt-0.5">
                            <p class="text-sm line-through">Confirmado</p>
                        </div>
                    </div>

                    <div class="bg-red-400 h-1 flex-1 mx-2"></div>

                    <div class="relative">
                        <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                            <i class="fas fa-film {{ ($order->status >=3) ? 'text-white' : ''}}"></i>
                        </div>    
                        
                        <div class="absolute -left-1 mt-0.5">
                            <p class="text-sm line-through">Editando</p>
                        </div>
                    </div>

                    <div class="bg-red-400 h-1 flex-1 mx-2"></div>

                    <div class="relative">
                        <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                            <i class="fas fa-photo-video {{ ($order->status >=4) ? 'text-white' : ''}}"></i>
                        </div>
                        <div class="absolute -left-2 mt-0.5">
                            <p class="text-sm line-through">Terminado</p>
                        </div>                              
                    </div>

                    <div class="bg-red-400 h-1 flex-1 mx-2"></div>

                    <div class="relative">
                        <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                            <i class="fas fa-truck {{ ($order->status >=5) ? 'text-white' : ''}}"></i>
                        </div>
                        <div class="absolute mt-0.5">
                            <p class="text-sm line-through">Enviado</p>
                        </div>                              
                    </div>

                    <div class="bg-red-400 h-1 flex-1 mx-2"></div>

                    <div class="relative">
                        <div class="bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                            <i class="fas fa-compact-disc {{ ($order->status >=6) ? 'text-white' : ''}}"></i>
                        </div>
                        <div class="absolute -left-2 mt-0.5">
                            <p class="text-sm line-through">Entregado</p>
                        </div>                              
                    </div>
                </div>
        @endif
        

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
                Orden-{{ $order->id }}</p>

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
                    @if ($order->envio_type == 1)
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
                    @foreach($items as $key => $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" 
                                        src="{{$item->options->image}}" alt="">
                                    <article>
                                        <h1 class="font-bold">{{$item->name}}</h1>
                                    </article>
                                </div>
                            </td>
                            <td class="text-center">
                                {{$item->price}} BOB
                            </td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>

        
    </div>
</x-app-layout>