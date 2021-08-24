<div wire:init="loadPosts">
    @if(count($services))
        <div class="glider-contain">
            <div class="glider-{{$category->id}}">
            
                @foreach ($services as $service)
                    <li class="bg-white rounded-lg shadow {{ $loop->last ? '' : 'sm:mr-4' }} list-none">
                        <article>
                            <figure>
                                <img class="h-48 w-full object-cover object-center" src="{{ Storage::url($service->image) }}" alt="">
                            </figure>
                            <div class="py-4 px-6">
                                <h1 class="text-lg font-semibold">
                                    <a href=" {{ route('services.show', $service) }} ">
                                        {{$service->name}}
                                    </a>
                                </h1>
                                <p class="font-bold text-trueGray-700">
                                    {{$service->price}}
                                </p>
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
