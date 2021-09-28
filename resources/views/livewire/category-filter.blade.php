<div>
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-700 uppercase">{{ $category->name }}</h1>

            <div class="hidden md:block grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-gray-500">
                <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-blue-500' : '' }}"
                    wire:click="$set('view', 'grid')"></i>
                <i class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-blue-500' : '' }}"
                    wire:click="$set('view', 'list')"></i>
            </div>
        </div>
    </div>

    @if ($view == 'grid')
        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($services as $service)
                <li class="bg-white rounded-lg shadow list-none">
                    <article>
                        <figure>
                            <img class="h-48 w-full object-cover object-center"
                                src="{{ Storage::url($service->image) }}" alt="">
                        </figure>
                        <div class="py-4 px-6">
                            <h1 class="text-lg font-semibold">
                                <a href="{{ route('services.show', $service) }}">
                                    {{ $service->name }}
                                </a>
                            </h1>
                            <p class="font-bold text-trueGray-700">
                                {{ $service->price }}
                            </p>
                        </div>
                        <div class="ml-2 mt-4 md:mt-auto mb-2">
                                
                            <x-danger-enlace href="{{ route('services.show', $service) }}">
                                Más información
                            </x-danger-enlace>
                        </div>
                    </article>
                </li>
            @endforeach
        </ul>
    @else
        <ul>
            @foreach ($services as $service)
                <li class="bg-white rounded-lg shadow mb-4">
                    <article class="md:flex">
                        <figure>
                            <img class="h-48 w-full md:w-56 object-cover object-center" src="{{ Storage::url($service->image) }}"
                                alt="">
                        </figure>

                        <div class="flex-1 py-4 px-6 flex flex-col">
                            <div class="flex justify-between">
                                <div>
                                    <h1 class="text-lg font-semibold text-gray-700">{{ $service->name }}</h1>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-700">BOB {{ $service->price }}</p>
                                </div>
                            </div>
                            <div class="mt-4 md:mt-auto mb-2">
                                
                                <x-danger-enlace href="{{ route('services.show', $service) }}">
                                    Más información
                                </x-danger-enlace>
                            </div>
                        </div>
                    </article>
                </li>
            @endforeach
        </ul>
    @endif
    <div class="mt-4">
        {{ $services->links() }}
    </div>

</div>
