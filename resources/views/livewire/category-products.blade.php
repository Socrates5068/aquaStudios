<div wire:init="loadPosts">
    @if (count($services))
        <div class="glider-contain">
            <div class="glider-{{ $category->id }}">

                @foreach ($services as $service)
                    <li class="bg-white rounded-lg shadow {{ $loop->last ? '' : 'sm:mr-4' }} list-none">
                        <article>
                            <figure>
                                <a href="{{ route('services.show', $service) }}">
                                    <img class="h-96 w-full object-cover object-center rounded-t-lg"
                                        src="{{ Storage::url($service->image) }}" alt="">
                                </a>
                            </figure>

                            <div class="px-4 py-2">
                                <h1 class="font-roboto text-3xl font-bold text-gray-800 uppercase dark:text-white">
                                    <a href=" {{ route('services.show', $service) }} ">
                                        {{ $service->name }}
                                    </a>
                                </h1>
                                <span class="prose prose-sm font-roboto font-light mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {!! substr($service->description, 0, 280) !!} ......
                                </span>
                            </div>

                            <div class="flex items-center justify-between px-4 py-2 bg-gray-900">
                                <h1 class="font-roboto text-lg font-bold text-white">BOB {{ $service->price }}</h1>
                                <a href="{{ route('services.show', $service) }}">
                                    <button
                                        class="px-2 py-1 text-xs font-semibold text-gray-900 uppercase transition-colors duration-200 transform bg-white rounded hover:bg-gray-200 focus:bg-gray-400 focus:outline-none">
                                        Más información</button>
                                </a>
                            </div>
                        </article>
                    </li>
                @endforeach

            </div>

            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>
    @else
        <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-gray-100 rounded-lg">
            <div class="rounded animate-spin ease duration-300 w-10 h-10 border-2 border-indigo-500"></div>
        </div>
    @endif
</div>
