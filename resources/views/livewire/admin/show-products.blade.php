<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                Lista de servicios
            </h2>

            <x-button-enlace class="ml-auto" href="{{ route('admin.services.create') }}">
                Agregar servicio
            </x-button-enlace>
        </div>
    </x-slot>

    @foreach ($categories as $categorie)      
        @if ($services->count())
            <div class="container py-12">
                <x-table-responsive>
                    <table class="min-w-full divide-y divide-gray-200">
                        <div class="p-3 ">
                            <p class="text-2xl font-bold text-blue-600 flex justify-between">
                                {{ $categorie->name }} {!!$categorie->icon!!}
                            </p>
                        </div>
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Descripción
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Estado
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Categoría
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Precio
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Editar</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($services as $service)
                                @if ($service->category_id == $categorie->id)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full object-cover"
                                                        src="{{ Storage::url($service->image) }}" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $service->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                {!! substr($service->description, 0, 50) . '...' !!}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @switch($service->status)
                                                @case(1)
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        Borrador
                                                    </span>
                                                @break
                                                @case(2)
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Publicado
                                                    </span>
                                                @break
                                                @default

                                            @endswitch

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $service->category->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $service->price . 'BOB' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('admin.services.edit', $service) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                            <a class="px-2 pl-2 hover:text-red-600 cursor-pointer"
                                                wire:click="$emit('deleteService', {{ $service }} )">Eliminar</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    <div class="px-6 py-4">
                        {{ $services->links() }}
                    </div>
                </x-table-responsive>
            </div>

        @else
            <div class="px-6 py-4">
                No hay ningún registro coincidente
            </div>
        @endif
    @endforeach



    @push('script')
        <script>
            Livewire.on('deleteService', service => {

                Swal.fire({
                    title: '¿Está seguro?',
                    text: "¡No podrá revertir está acción!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        //Livewire.emitTo('admin.create-category', 'delete', categoryId)
                        Livewire.emit('delete', service)
                        Swal.fire(
                            '¡Eliminado!',
                            'El servicio a sido eliminado.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush

</div>
