<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                Lista de reservas
            </h2>
        </div>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="container py-12">
        <x-table-responsive>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Contacto
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Dirección
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Estado
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Editar</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($orders as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                   {{--  <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full object-cover"
                                            src="{{ Storage::url($order->image) }}"
                                            alt="">
                                    </div> --}}
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $order->name_contact }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ substr($order->phone_contact, 0, 50) . "..."}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{$order->d_address}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @switch($order->status)
                                    @case(1)
                                        <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Pendiente
                                        </span>
                                        @break
                                    @case(2)
                                        <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Confirmado
                                        </span>
                                        @break
                                    @case(3)
                                        <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Edición
                                        </span>
                                        @break
                                    @case(4)
                                        <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Terminado
                                        </span>
                                        @break
                                    @case(5)
                                        <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Enviado
                                        </span>
                                        @break
                                    @case(6)
                                        <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Entregado
                                        </span>
                                        @break
                                    @case(7)
                                        <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800">
                                        Anulado
                                        </span>
                                        @break
                                        
                                    @default
                                        
                                @endswitch
                                
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.orders.edit', $order) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                            </td>
                        </tr>
                        
                    @endforeach
                    
    
                    <!-- More people... -->
                </tbody>
            </table>

            <div   class="px-6 py-4">
                {{$orders->links()}}
            </div>
        </x-table-responsive>

    </div>
</div>
