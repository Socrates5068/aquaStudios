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
                    <svg class="fill-current w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                    Descargar fotos
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
                            <div class="{{ $photo->status == 2 ? 'border-solid border-8 border-red-600' : '' }} cursor-pointer relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1"
                                wire:click='updateStatus({{ $photo }})'>
                                <img src="{{ Storage::url($photo->route_image) }}"
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
