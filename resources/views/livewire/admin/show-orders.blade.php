<div>
    @php
        use App\Models\Category;
    @endphp
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                Lista de reservas
            </h2>
        </div>
    </x-slot>
    <div class="grid justify-items-end px-8">
        <div class="justify-self-start">
            <x-jet-input class="mb-4 text-center"
                type="date"
                wire:model.defer='from'
                >
            </x-jet-input>
            <x-jet-input-error for="from" />

            <x-jet-input class="mb-4 text-center"
                type="date"
                wire:model.defer='to'
                >
            </x-jet-input>
            <x-jet-input-error for="to" />
        
        <div class="justify-self-start">
            <x-jet-button class="text-center"
                wire:click="SetFromAndTo"
                >
                Generar reporte
            </x-jet-button>

            <x-button-enlace class="text-center cursor-pointer"
                wire:click='savePdf'
                >
                Generar PDF
            </x-button-enlace>
        </div>
    </div>
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
                            Evento y categoria
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
                    @foreach($this->getorders() as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full object-cover"
                                            src="{{ $order->user->profile_photo_url }}"
                                            alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $order->name_contact }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ substr($order->phone_contact, 0, 50)}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @php
                                    $service = json_decode($order->service, true);
                                    $category = Category::where('id', $service['category_id'])->first();
                                @endphp
                                {{$service['name']}} <br>
                                @if ($category)
                                    {{$category->name}}
                                @endif                                
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

            @if ($num == 0)
                <div class="px-6 py-4">
                    {{$this->getorders()->links()}}
                </div>
            @endif
        </x-table-responsive>

    </div>
</div>
