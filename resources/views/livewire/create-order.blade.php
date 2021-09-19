<div class="container py-8 grid grid-cols-5 gap-6">
    <div class="col-span-3">
        {{-- information for delivery --}}
        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-4">
                <x-jet-label value="Nombre de contacto" />
                <x-jet-input type="text"
                            wire:model.defer="contact"
                            placeholder="Ingrese el nombre de contacto"
                            class="w-full" />
                <x-jet-input-error for="contact" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Telefeno de contacto" />
                <x-jet-input type="text"
                            wire:model.defer="phone"
                            placeholder="Ingrese un número de contacto"
                            class="w-full" />    
                <x-jet-input-error for="phone" />                        
            </div>
        </div>
        
        <div x-data="{envio_type: @entangle('envio_type')}">
            <p class="mt-6 mb-3 text-lg text-gray-700 font-semibold">Envios</p>
    
            <label class="bg-white rounded-lg shadow px-6 py-4 flex items-center mb-4 cursor-pointer">
                <input x-model="envio_type" type="radio" value="1" name="envio_type" class="text-gray-600">
                <span class="ml-2 text-gray-700">Recoger en tienda</span>
                <span class="font-semibold text-gray-700 ml-auto">Gratis</span>
            </label>

            <div class="bg-white rounded-lg shadow">
                <label class="px-6 py-4 flex items-center cursor-pointer">
                    <input x-model="envio_type" type="radio" value="2" name="envio_type" class="text-gray-600" />
                    <span class="ml-2 text-gray-700">
                        Envío a domicilio
                    </span>
                </label>
                {{-- address for delivery --}}
                <div class="px-6 pb-6 hidden" :class="{ 'hidden': envio_type != 2 }" >
                    <div>
                        <x-jet-label value="Dirección" />
                        <x-jet-input class="w-full" wire:model="address" type="text" />
                        <x-jet-input-error for="address" />
                    </div>
                </div>
            </div>
        </div>

        <div>
            <x-jet-button 
                wire:loading.attr="disabled"
                wire:target="create_order"
                class="mt-6 mb-4"  
                wire:click="create_order">
                Continuar con la compra
            </x-jet-button>

            <hr>
            <p class="text-sm text-gray-700 mt-2 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, deserunt consequatur voluptatibus porro eligendi reprehenderit corporis quia autem. Dicta, ratione iusto. Consectetur unde et rerum laborum ullam repellendus aspernatur dignissimos. <a class="font-semibold text-red-500" href="">Proliticas y privacidad</a> </p>
        </div>

    </div>

    <div class="col-span-2">
        <div class="bg-white rounded-lg shadow p-6">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-center mr-4" src="{{$item->options->image}}" alt="">
                        <article class="flex-1">
                            <h1 class="font-bold">{{$item->name}}</h1>
                            <p>Cantidad: {{$item->qty}}</p>
                            <p>USD: {{$item->price}}</p>
                        </article>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-700">
                            No tiene agregado ningún itemen el carrito
                        </p>
                    </li>
                @endforelse
            </ul>

            <hr class="mt-4 mb-3">
            <div class="text-gray-700">
                <p class=" flex justify-between items-center">
                    Subtotal
                    <span class="font-semibold">{{Cart::subtotal()}} BOB</span>
                </p>
                <p class=" flex justify-between items-center">
                    Envio
                    <span class="font-semibold">
                        @if ($envio_type == 1)
                         Gratis                            
                        @else
                            {{$shipping_cost}} BOB
                        @endif
                    </span>
                </p>
                <hr class="mt-4 mb-3">
                <p class=" flex justify-between items-center font-semibold">
                    <span class="text-lg">Total</span>
                    @if ($envio_type == 1)
                        {{Cart::subtotal()}} BOB                        
                    @else
                        {{Cart::subtotal() + $shipping_cost}} BOB
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
