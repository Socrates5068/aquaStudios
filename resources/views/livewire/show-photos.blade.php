<div>
    <x-photo-responsive>
        <div class="relative px-6 py-4 mb-6">
            <div class="absolute inset-y-0 left-0">
                <x-button-enlace color="blue" href="javascript:history.back()">
                    Ir atrás
                </x-button-enlace>
            </div>
            <div class="absolute inset-y-0 right-0">
                <x-button-enlace color="blue"
                    href="{{ route('photos.download', $order) }}">
                    Descargar todas las fotos
                </x-button-enlace>
            </div>

        </div>
        <div class="bg-white rounded-lg grid justify-items-stretch shadow-lg px-6 py-4 mb-6">
            <h2 class="text-2xl font-extrabold text-gray-900">Fotografías del evento</h2>
            <p class="text-sm text-gray-700 mt-2 text-justify">Para marcar una fotografía, haga click sobre ella y esta
                quedará marcada</p>

            <div class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6">
                @if ($photos->count())
                    @foreach ($photos as $photo)
                        <div class="group relative mb-6">
                            <div
                                class="{{ $photo->status == 2 ? 'border-solid border-8 border-red-600' : '' }} relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                                <img src="{{ Storage::url($photo->route_image) }}"
                                    wire:click='updateStatus({{ $photo }})'
                                    class="w-full h-full object-center object-cover">
                                <span class="relative inline-block">
                                    <span></span>
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
        </div>


    </x-photo-responsive>
</div>
