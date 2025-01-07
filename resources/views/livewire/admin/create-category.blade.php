<div>
    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Crear nueva categoria
        </x-slot>

        <x-slot name="description">
            Complete la informaciona necesaria para crear una nueva categoria
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre
                </x-jet-label>
                <x-jet-input wire:model="createForm.name" class="w-full mt-1" type="text" />
                <x-jet-input-error for="createForm.name" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Ícono
                </x-jet-label>
                <x-jet-input wire:model.defer="createForm.icon" class="w-full mt-1" type="text" id={{$rand}} />
                <x-jet-input-error for="createForm.icon" />
                <p class="mt-2 font-roboto text-sm">
                    Escoger un ícono <a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2&q=video&c=audio-video&m=free" target="_blank" class="link link-secondary">aquí</a>
                </p>
            </div>
            
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                Categoria creada
            </x-jet-action-message>
            <x-jet-button>
                Agregar categoria
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <x-jet-action-section>
        <x-slot name="title">
            Lista de categorias
        </x-slot>
            Aquí encontrará todas las categorias
        <x-slot name="description">
        </x-slot>
        
        <x-slot name="content">
            <table class="text-gray-600"> 
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2 w-full">Nombre</th>
                        <th class="py-2">Acción</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-300">
                    @foreach($categories as $category)
                        <tr>
                            <td class="py-2">
                                <span class="inline-block w-8 text-center mr-2">
                                    {!!$category->icon!!}
                                </span>
                                <span class="uppercase">
                                    {{$category->name}}
                                </span>
                            </td>
                            <td class="py-2">
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer" wire:click="edit('{{$category->id}}')">Editar</a>
                                    <a class="pl-2 hover:text-red-600 cursor-pointer"
                                        wire:click="$emit('deleteCategory', {{$category->id}} )">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-jet-action-section>

    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar categoria
        </x-slot>
        
        <x-slot name="content">
            <div class="space-y-3">
                <div class="">
                    <x-jet-label>
                        Nombre
                    </x-jet-label>
                    <x-jet-input wire:model="editForm.name" class="w-full mt-1" type="text" />
                    <x-jet-input-error for="editForm.name" />
                </div>
    
                <div class="">
                    <x-jet-label>
                        Ícono
                    </x-jet-label>
                    <x-jet-input wire:model.defer="editForm.icon" class="w-full mt-1" type="text" id={{$rand}} />
                    <x-jet-input-error for="editForm.icon" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
