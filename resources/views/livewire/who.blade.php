<div>
    @push('style')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
            integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
            crossorigin="" />
        <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css" />
    @endpush

    <div class="container grid bg-white dark:bg-gray-800">
        <div class="container px-6 py-8 mx-auto">
            <div class="items-center lg:flex">
                <div class="lg:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100 md:px-12">¿Quienes somos?</h2>

                    <p class="mt-4 text-gray-500 dark:text-gray-400 md:px-12">
                        Hi I am jane , software engineer <a class="font-bold text-indigo-600 dark:text-indigo-400"
                            href="#">@BakaTeam</a> , Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum in
                        sed non alias, fugiat, commodi nemo ut fugit corrupti dolorem sequi ex veniam consequuntur id,
                        maiores beatae ipsa omnis aliquam?sed non alias, fugiat, commodi nemo ut fugit corrupti dolorem
                        sequi ex veniam consequuntur id,sed non alias, fugiat, commodi nemo ut fugit corrupti dolorem
                        sequi ex veniam consequuntur id,
                    </p>
                </div>

                <div class="mt-8 lg:mt-0 lg:w-1/2">
                    <div class="flex items-center justify-center lg:justify-end">
                        <div class="w-full">
                            <img class="object-cover object-center w-full h-96 rounded-lg shadow"
                                src="{{ Storage::url($info->image) }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-3 mb-3">

        <div class="container px-6 py-8 mx-auto">
            <div class="items-center lg:flex">
                <div class="lg:w-1/2">
                    <div class="flex items-center justify-center lg:justify-start">
                        <div class="w-full lg:mr-8">
                            {{-- Map address 1 --}}
                            <div class="mt-2 mb-6">
                                <div id='contact_map' class="h-80 mb-2"></div>
                                {{-- {{$lat}} {{$lng}} --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" lg:w-1/2">
                    <h2
                        class="flex justify-center lg:justify-start items-center text-2xl font-bold text-gray-800 dark:text-gray-100 md:px-16 ">
                        Encuentranos</h2>

                    <div
                        class="flex justify-center lg:justify-start items-center mt-4 text-gray-500 dark:text-gray-400 md:px-24 lg:px-18">
                        <p class="font-bold text-center md:text-left">Dirección: 
                            <span class="font-normal">{{$info->address}}</span></p> 
                    </div>
                    <div
                        class="flex justify-center lg:justify-start items-center mt-4 text-gray-500 dark:text-gray-400 md:px-24 lg:px-18">
                        <p class="font-bold text-center md:text-left">Telefono: 
                            <span class="font-normal">{{$info->telephone}}</span></p>
                    </div>
                    <div
                        class="flex justify-center lg:justify-start items-center mt-4 text-gray-500 dark:text-gray-400 md:px-24 lg:px-18">
                        <p class="font-bold text-center md:text-left">Horarios de atención: 
                            <span class="font-normal">{{$info->schedule}}</span></p>
                    </div>

                    <h2
                        class="flex justify-center lg:justify-start items-center mt-6 text-2xl font-bold text-gray-800 dark:text-gray-100 md:px-16 ">
                        Nuestras redes sociales</h2>

                    <div class="flex justify-center lg:justify-start items-center mt-6">
                        <a href="{{ $info->twitter }}"
                            class="mx-2 lg:ml-24" aria-label="Twitter">
                            <svg class="w-10 h-10 text-gray-700 fill-current dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M492 109.5c-17.4 7.7-36 12.9-55.6 15.3 20-12 35.4-31 42.6-53.6-18.7 11.1-39.4 19.2-61.5 23.5C399.8 75.8 374.6 64 346.8 64c-53.5 0-96.8 43.4-96.8 96.9 0 7.6.8 15 2.5 22.1-80.5-4-151.9-42.6-199.6-101.3-8.3 14.3-13.1 31-13.1 48.7 0 33.6 17.2 63.3 43.2 80.7-16-.4-31-4.8-44-12.1v1.2c0 47 33.4 86.1 77.7 95-8.1 2.2-16.7 3.4-25.5 3.4-6.2 0-12.3-.6-18.2-1.8 12.3 38.5 48.1 66.5 90.5 67.3-33.1 26-74.9 41.5-120.3 41.5-7.8 0-15.5-.5-23.1-1.4C62.8 432 113.7 448 168.3 448 346.6 448 444 300.3 444 172.2c0-4.2-.1-8.4-.3-12.5C462.6 146 479 129 492 109.5z" />
                            </svg>
                        </a>

                        <a href="{{ $info->facebook }}"
                            class="mx-2" aria-label="Facebook">
                            <svg class="w-10 h-10 text-gray-700 fill-current dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M426.8 64H85.2C73.5 64 64 73.5 64 85.2v341.6c0 11.7 9.5 21.2 21.2 21.2H256V296h-45.9v-56H256v-41.4c0-49.6 34.4-76.6 78.7-76.6 21.2 0 44 1.6 49.3 2.3v51.8h-35.3c-24.1 0-28.7 11.4-28.7 28.2V240h57.4l-7.5 56H320v152h106.8c11.7 0 21.2-9.5 21.2-21.2V85.2c0-11.7-9.5-21.2-21.2-21.2z" />
                            </svg>
                        </a>

                        <a href="{{ $info->instagram }}"
                            class="mx-2" aria-label="Linkden">
                            <svg class="w-8 h-8 text-gray-700 fill-current dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M15.233 5.488c-.843-.038-1.097-.046-3.233-.046s-2.389.008-3.232.046c-2.17.099-3.181 1.127-3.279 3.279-.039.844-.048 1.097-.048 3.233s.009 2.389.047 3.233c.099 2.148 1.106 3.18 3.279 3.279.843.038 1.097.047 3.233.047 2.137 0 2.39-.008 3.233-.046 2.17-.099 3.18-1.129 3.279-3.279.038-.844.046-1.097.046-3.233s-.008-2.389-.046-3.232c-.099-2.153-1.111-3.182-3.279-3.281zm-3.233 10.62c-2.269 0-4.108-1.839-4.108-4.108 0-2.269 1.84-4.108 4.108-4.108s4.108 1.839 4.108 4.108c0 2.269-1.839 4.108-4.108 4.108zm4.271-7.418c-.53 0-.96-.43-.96-.96s.43-.96.96-.96.96.43.96.96-.43.96-.96.96zm-1.604 3.31c0 1.473-1.194 2.667-2.667 2.667s-2.667-1.194-2.667-2.667c0-1.473 1.194-2.667 2.667-2.667s2.667 1.194 2.667 2.667zm4.333-12h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm.952 15.298c-.132 2.909-1.751 4.521-4.653 4.654-.854.039-1.126.048-3.299.048s-2.444-.009-3.298-.048c-2.908-.133-4.52-1.748-4.654-4.654-.039-.853-.048-1.125-.048-3.298 0-2.172.009-2.445.048-3.298.134-2.908 1.748-4.521 4.654-4.653.854-.04 1.125-.049 3.298-.049s2.445.009 3.299.048c2.908.133 4.523 1.751 4.653 4.653.039.854.048 1.127.048 3.299 0 2.173-.009 2.445-.048 3.298z" />
                            </svg>
                        </a>

                        <a href="{{ $info->whatsapp }}"
                            class="mx-2" aria-label="Github">
                            <svg class="w-8 h-8 text-gray-700 fill-current dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M12.036 5.339c-3.635 0-6.591 2.956-6.593 6.589-.001 1.483.434 2.594 1.164 3.756l-.666 2.432 2.494-.654c1.117.663 2.184 1.061 3.595 1.061 3.632 0 6.591-2.956 6.592-6.59.003-3.641-2.942-6.593-6.586-6.594zm3.876 9.423c-.165.463-.957.885-1.337.942-.341.051-.773.072-1.248-.078-.288-.091-.657-.213-1.129-.417-1.987-.858-3.285-2.859-3.384-2.991-.099-.132-.809-1.074-.809-2.049 0-.975.512-1.454.693-1.653.182-.2.396-.25.528-.25l.38.007c.122.006.285-.046.446.34.165.397.561 1.372.611 1.471.049.099.083.215.016.347-.066.132-.099.215-.198.33l-.297.347c-.099.099-.202.206-.087.404.116.198.513.847 1.102 1.372.757.675 1.395.884 1.593.983.198.099.314.083.429-.05.116-.132.495-.578.627-.777s.264-.165.446-.099 1.156.545 1.354.645c.198.099.33.149.38.231.049.085.049.482-.116.945zm3.088-14.762h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-6.967 19.862c-1.327 0-2.634-.333-3.792-.965l-4.203 1.103 1.125-4.108c-.694-1.202-1.059-2.566-1.058-3.964.002-4.372 3.558-7.928 7.928-7.928 2.121.001 4.112.827 5.609 2.325s2.321 3.491 2.32 5.609c-.002 4.372-3.559 7.928-7.929 7.928z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
                integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
                crossorigin=""></script>
        <script src="https://unpkg.com/esri-leaflet" defer></script>
        <script src="https://unpkg.com/esri-leaflet-geocoder" defer></script>
    @endpush
</div>
