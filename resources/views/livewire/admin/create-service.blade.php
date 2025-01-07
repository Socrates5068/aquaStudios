<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">Complete la informacion para crear un nuevo servicio</h1>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="mb-4">
            <x-jet-label value="Categorias" />
            <select class="w-full form-control" wire:model="category_id">
                <option value="" selected disabled>Seleccione una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="category_id" />
        </div>

        <div class="mb-4">
            <x-jet-label value="Nombre" />
            <x-jet-input class="w-full" type="text" wire:model="name"
                placeholder="Ingrese el nombre del servicio" />
            <x-jet-input-error for="name" />
        </div>

        <div class="mb-4">
            <x-jet-label value="Imagen" />

            @if ($tmp)
                Vista previa de la imagen:
                <img class="mb-4 h-96" src="{{ $tmp->temporaryUrl() }}">
            @endif

            <div class="flex items-center justify-center w-full">
                <label class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">
                    <div class="flex flex-col items-center justify-center pt-7">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-12 h-12 text-gray-400 group-hover:text-gray-600" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                clip-rule="evenodd" />
                        </svg>
                        <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                            Selecciona una imagen</p>
                    </div>

                    <input wire:model.defer="image" type="file" class="opacity-0"
                        accept="image/png, image/gif, image/jpeg, image/jpg, image/bmp" required />
                </label>
            </div>
            <x-jet-input-error for="image" />
        </div>

        <div class="mb-4">
            {{-- <div wire:ignore>
                <x-jet-label value="Descripción" />
                <textarea class="w-full form-control" rows="4" 
                x-data x-init="ClassicEditor.create( $refs.miEditor )
                    .then(function(editor){
                        editor.model.document.on('change:data', () => {
                            @this.set('description', editor.getData())
                        })
                    })
                    .catch( error => {
                        console.error( error );
                    } );" x-ref="miEditor">
                </textarea>
            </div> --}}
            <div wire:ignore>
                <x-jet-label value="Descripción" />
                <textarea class="w-full form-control" rows="4"
                x-data x-init="const editor = CKEDITOR.replace($refs.miEditor);
                    editor.on('change', function(event){
                        console.log(event.editor.getData())
                        @this.set('description', event.editor.getData());
                    })"
                x-ref="miEditor"
                >
                </textarea>
            </div>
            <x-jet-input-error for="description" />
        </div>

        <div class="mb-4">
            <x-jet-label value="Precio en Bs." />
            <x-jet-input class="w-full" type="number" step=".01" wire:model="price"
                placeholder="Ingrese el precio del servicio" />
            <x-jet-input-error for="price" />
        </div>

        <div class="flex">
            <x-jet-button class="ml-auto" wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Crear servicio
            </x-jet-button>
        </div>
    </div>
</div>
