<x-app-layout>

    <header>
        <div class="bg-opacity-10 container mx-auto h-64 md:h-96 rounded-md flex items-center
                     bg-hero-pattern bg-cover md:bg-center">
            <div class="sm:ml-20 text-gray-50 text-center sm:text-left">
                <h1 class="font-mogra uppercase text-shadow-h2 text-white text-4xl md:text-6xl mb-4">
                    Momentos <br />
                    inolvidables.
                </h1>
                <p class="font-mogra text-shadow-h2 text-lg md:text-2xl inline-block sm:block">Te ayudamos a guardar los mejores momentos de tu vida.</p>
                {{-- <button class="mt-8 px-4 py-2 bg-gray-600 rounded">Browse saunas</button> --}}
            </div>
        </div>
    </header>

    <div class="py-16 container">
        @foreach ($categories as $category)
            <section class="mb-6">
                <div class=" flex items-center">
                    <h1 class="font-roboto text-lg uppercase font-semibold text-gray-700">
                        {{ $category->name }}
                    </h1>
                    <a href="{{ route('categories.show', $category) }}"
                        class="text-blue-500 hover:text-blue-400 hover:underline ml-2 font-semibold">Ver más</a>
                </div>
                @livewire('category-products', ['category' => $category])
            </section>
        @endforeach
    </div>
    @push('script')

        <script>
            Livewire.on('glider', function(id) {

                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [{
                            breakpoint: 640,
                            settings: {
                                slidesToShow: 1.5,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1.5,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 2.5,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 1280,
                            settings: {
                                slidesToShow: 2.5,
                                slidesToScroll: 1,
                            }
                        },
                    ]
                });

            });
        </script>

    @endpush
</x-app-layout>
