<x-app-layout>

    <div class="container py-12">
        @if ($orders->count())
            
        
            <section class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
                <h1 class="text-2xl mb-4">Pedidos recientes</h1>

                <ul>
                    @foreach ($orders as $order)
                        <li>
                            <a href="{{route('orders.show', $order)}}" class="flex items-center py-2 px-4 hover:bg-gray-100">
                                <span class="w-12 text-center">
                                    @switch($order->status)
                                        @case(1)
                                            <i class="fas fa-business-time text-red-500 opacity-50"></i>
                                            @break
                                        @case(2)
                                            <i class="fas fa-credit-card text-gray-500 opacity-50"></i>
                                            @break
                                        @case(3)
                                            <i class="fas fa-film text-yellow-500 opacity-50"></i>
                                            @break
                                        @case(4)
                                            <i class="fas fa-photo-video text-pink-500 opacity-50"></i>
                                            @break
                                        @case(5)
                                            <i class="fas fa-truck text-green-500 opacity-50"></i>
                                            @break
                                        @case(6)
                                            <i class="fas fa-compact-disc text-green-500 opacity-50"></i>
                                            @break
                                        @case(7)
                                            <i class="far fa-times-circle text-red-500 opacity-50"></i>
                                            @break
                                        @default
                                            
                                    @endswitch
                                </span>

                                <span>
                                    Orden: {{$order->id}}
                                    <br>
                                    {{$order->created_at->format('d/m/Y')}}
                                </span>


                                <div class="ml-auto">
                                    <span class="font-bold">
                                        @switch($order->status)
                                            @case(1)                                                
                                                Pendiente
                                                @break
                                            @case(2)                                                
                                                Confirmado
                                                @break
                                            @case(3)                                                
                                                Editando
                                                @break
                                            @case(4)                                                
                                                Terminado
                                                @break
                                            @case(5)                                                
                                                Enviado
                                                @break
                                            @case(6)                                                
                                                Entregado
                                                @break
                                            @case(7)                                                
                                                Anulado
                                                @break
                                            @default
                                                
                                        @endswitch
                                    </span>

                                    <br>

                                    <span class="text-sm">
                                        {{$order->total}} BOB
                                    </span>
                                </div>

                                <span>
                                    <i class="fas fa-angle-right ml-6"></i>
                                </span>

                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>

        @else
        <div class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
            <span class="font-bold text-lg">
                No existe registros de ordenes
            </span>
        </div>
        @endif

    </div>

</x-app-layout>