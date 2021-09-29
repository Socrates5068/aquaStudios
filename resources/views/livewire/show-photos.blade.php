<div>
    <x-photo-responsive>
        <a href="javascript:history.back()">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6">
                Ir atrás
            </button>
        </a>
        <h2 class="text-2xl font-extrabold text-gray-900">Fotografías del evento</h2>
        <p class="text-sm text-gray-700 mt-2 text-justify">Para marcar una fotografía, haga click sobre ella y esta quedará marcada</p>
        
        <div class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6">
        @if ($photos->count())
            @foreach ($photos as $photo)
                <div class="group relative mb-6">
                    <div
                        class="{{ ($photo->status == 2) ? 'border-solid border-8 border-red-600' : ''}} relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                        <img src="{{ Storage::url($photo->route_image) }}"
                            wire:click='updateStatus({{$photo}})'
                            class="w-full h-full object-center object-cover">
                        <span class="relative inline-block">
                            <span ></span>
                        </span>
                    </div>
                    {{-- <h3 class="mt-6 text-sm text-gray-500">
                        <a href="#">
                            <span class="absolute inset-0"></span>
                            Desk and Office
                        </a>
                    </h3>
                    <p class="text-base font-semibold text-gray-900">Work from home accessories</p> --}}
                </div>
            @endforeach
        @else
                No existen fotografías para este evento
        @endif
        </div>
        
    </x-photo-responsive>
</div>
