<div class="container py-8">
    <section class="bg-white rounded-lg shadow-lg p-6 text-gray-700">
        <h1 class="text-lg font-semibold mb-6">Carrito de compras</h1>

        @if(Cart::count())
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th class="text-right">Cant</th>
                        <th class="text-right">Precio</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach(Cart::content() as $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                                    <div>
                                        <p class="font-bold">{{$item->name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-right">{{$item->qty}}</td>
                            <td class="text-right">
                                <span>BOB {{$item->price}} </span>
                                <a class="ml-6 cursor-pointer hover:text-red-600"
                                    wire:click="delete('{{$item->rowId}}')"
                                    wire:loading.class="text-red-600 opacity-25"
                                    wire:target="delete('{{$item->rowId}}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>

            <a class="text-sm cursor-pointer hover:underline mt-4 inline-block"
                wire:click="destroy">
                <i class="fas fa-trash"></i>
                Borrar carrito de compras
            </a>
        @else
            <div class="flex flex-col items-center">
                <x-cart />
                <p class="text-lg text-gray-700 mt-4 uppercase">Tu carrito de compras esta vacío</p>

                <x-button-enlace class="mt-3 px-16" href="/">
                    Ir al inicio
                </x-button-enlace>
            </div>
        @endif
    </section>

    @if(Cart::count())
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class=" text-gray-700">
                        <span class="font-bold text-lg">Total: </span>
                        BOB {{Cart::subtotal()}}
                    </p>
                </div>
                <div>
                    <x-button-enlace href="{{route('orders.create')}}">
                        Continuar
                    </x-button-enlace>
                </div>
            </div>
        </div>
    @endif
</div>
