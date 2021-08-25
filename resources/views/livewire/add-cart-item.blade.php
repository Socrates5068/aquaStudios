<div>
    <div class="flex">
        <div class="flex-1">
            <x-button 
                class="w-full"
                wire:click="addItem"
                wire:loading.attr="disabled"
                wire:target="addItem">
                Agregar al carrito de compras
            </x-button>
        </div>
    </div>
</div>
