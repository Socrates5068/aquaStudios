<div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
        @if ($service->status == 1)
            <div class="bg-red-600 rounded-lg shadow-lg px-6 py-4 mb-6 items-center">
                <p class="text-center text-lg text-white font-bold uppercase cursor-pointer"
                wire:click="updateState({{2}})">
                    Servicio dado de baja
                </p>
                
            </div>
        @else
            <div class="bg-green-500 rounded-lg shadow-lg px-6 py-4 mb-6 items-center">
                <p class="text-center text-lg text-white font-bold uppercase cursor-pointer"
                    wire:click="updateState({{1}})">
                    Servicio dado de alta
                </p>
            </div>
        @endif
        <div class="flex items-center">
            <h1 class="text-3xl text-center font-semibold mb-8">
                Actualizar servicio
            </h1>
        </div>
        <div class="bg-white shadow-xl rounded-lg p-6">
            <div class="mb-4">
                <x-jet-label value="Categorias" />
                <select class="w-full form-control" wire:model="service.category_id">
                    <option value="" selected disabled>Seleccione una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="service.category_id" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input class="w-full" type="text" wire:model="service.name"
                    placeholder="Ingrese el nombre del servicio" />
                <x-jet-input-error for="service.name" />
            </div>

            <div class="mb-4">
                <div wire:ignore>
                    <x-jet-label value="Descripción" />
                    <textarea class="w-full form-control" rows="4" wire:model="service.description" x-data x-init="ClassicEditor.create( $refs.miEditor )
                        .then(function(editor){
                            editor.model.document.on('change:data', () => {
                                @this.set('service.description', editor.getData())
                            })
                        })
                        .catch( error => {
                            console.error( error );
                        } );" x-ref="miEditor">
                    </textarea>
                </div>
                <x-jet-input-error for="service.description" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Precio" />
                <x-jet-input class="w-full" type="number" step=".01" wire:model="service.price"
                    placeholder="Ingrese el precio del servicio" />
                <x-jet-input-error for="service.price" />
            </div>

            <div class="flex mt-4 justify-end">
                <x-jet-action-message class="mr-3" on="saved">
                    <span class="text-lg text-red-500">
                        Actualizado
                    </span>
                </x-jet-action-message>
                <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                    Actualizar servicio
                </x-jet-button>
            </div>
        </div>


    </div>

</div>
