<x-app-layout> 
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mt-8">
            <div>
                <img src="{{ Storage::url($service->image); }}" alt="">
            </div>
            <div>
                <h1 class="text-xl font-bold text-trueGray-700">{{$service->name}}</h1>
                <p class="text-2xl font-semibold text-trueGray-700 my-4">USD {{ $service->price }}</p>

                <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-greenLime-600">
                            <i class="fas fa-truck text-sm text-white"></i>
                        </span>
                        
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-greenLime-600">Se hace envíos a todo Potosí</p>
                            <p>Recíbelo hasta el {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex-1">
                        {{-- @livewire('add-cart-item', ['service' => $service]) --}}
                        <x-button-enlace href="{{ route('orders.create', $service) }}" color="blue" class="w-full">
                            Comprar este servicio
                        </x-button-enlace>

                    </div>

                </div>
            </div>
        </div>
        <div class="text-gray-700 mt-6">
            <h2 class="font-bold text-lg">Descripción</h2>
            {!!$service->description!!}
        </div>
    </div>
</x-app-layout>