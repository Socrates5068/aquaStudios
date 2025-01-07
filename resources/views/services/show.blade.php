<x-app-layout> 
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mt-8">
            <div>
                <img class="rounded-lg" src="{{ Storage::url($service->image); }}" alt="">
            </div>
            <div class="" >
                <div class="w-full">

                    <h1 class="font-roboto text-lg md:text-2xl font-bold text-trueGray-700 uppercase">{{$service->name}}</h1>
                    <p class="font-roboto text-lg md:text-2xl font-semibold text-trueGray-700 my-4">BOB {{ $service->price }}</p>
    
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
                            <x-button-enlace href="{{ route('orders.create', $service) }}" class="w-full">
                                Contratar este servicio
                            </x-button-enlace>
    
                        </div>
    
                    </div>
                </div>
            </div>
        </div>        

        <div class="prose prose-sm max-w-full p-6 mt-6 bg-white rounded-lg shadow-lg">    

                <h2 class="font-bold text-gray-800 mb-2 md:uppercase">Detalles del servicio</h1>
                <span class="mt-2 text-sm md:text-lg text-gray-600 dark:text-gray-400">
                    {{-- {!!$service->description!!} --}}
                    {!!$service->description!!}
                </span>
        </div>
    </div>
</x-app-layout>

