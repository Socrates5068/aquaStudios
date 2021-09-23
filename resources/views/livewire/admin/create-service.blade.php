<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">Complete la informacion para crear un nuevo servicio</h1>

    <div class="mb-4">
        <x-jet-label value="Categorias" />
        <select class="w-full form-control" wire:model="category_id">
            <option value="" selected disabled>Seleccione una categoria</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <x-jet-input-error for="category_id" />
    </div>

    <div class="mb-4">
        <x-jet-label value="Nombre" />
        <x-jet-input class="w-full" 
                    type="text" 
                    wire:model="name"
                    placeholder="Ingrese el nombre del servicio" />
        <x-jet-input-error for="name" />           
    </div>

    <div class="mb-4" >
        <div wire:ignore>
            <x-jet-label value="Descripción" />
            <textarea class="w-full form-control" rows="4"
                x-data
                x-init="ClassicEditor.create( $refs.miEditor )
                .then(function(editor){
                    editor.model.document.on('change:data', () => {
                        @this.set('description', editor.getData())
                    })
                })
                .catch( error => {
                    console.error( error );
                } );"
                x-ref="miEditor">
            </textarea>
        </div>
        <x-jet-input-error for="description" />
    </div>

    <div class="mb-4" >
        <x-jet-label value="Precio" />
        <x-jet-input class="w-full" 
                    type="number" 
                    step=".01"
                    wire:model="price"
                    placeholder="Ingrese el precio del servicio" />
        <x-jet-input-error for="price" />
    </div>

    <div class="flex">
        <x-jet-button 
            class="ml-auto" 
            wire:loading.attr="disabled"
            wire:target="save"
            wire:click="save">
            Crear servicio
        </x-jet-button>
    </div>


</div>
