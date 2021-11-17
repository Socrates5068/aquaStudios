<div>
    <div class="md:mt-4 w-full max-w-2xl px-6 py-4 mx-auto">
        @if (session()->has('message'))
            <div class="flex w-full mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="flex items-center justify-center w-12 bg-green-500">
                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                    </svg>
                </div>

                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <span class="font-semibold text-green-500 dark:text-green-400">Éxito</span>
                        <p class="text-sm text-gray-600 dark:text-gray-200">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="md:mt-4 w-full max-w-2xl px-6 py-4 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">

        <h2 class="mb-6 text-3xl font-semibold text-center text-gray-800 dark:text-white">Comunicate con nosotros</h2>
        <p class="mt-3 text-center text-gray-600 dark:text-gray-400">Si ningún servicio ofrecido en esta página
            se adapta a tus necesidades, escribenos detallando tus requerimientos y nosotros te contactaremos para
            cotizar tu pedido.</p>

        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 md:grid-cols-3">
            <a
                class="flex flex-col items-center px-4 py-3 text-gray-700 rounded-md dark:text-gray-200 hover:bg-blue-200 dark:hover:bg-blue-500">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd" />
                </svg>

                <span class="mt-2 text-center">{{ $info->address }}</span>
            </a>

            <a
                class="flex flex-col items-center px-4 py-3 text-gray-700 rounded-md dark:text-gray-200 hover:bg-blue-200 dark:hover:bg-blue-500">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                </svg>

                <span class="mt-2 text-center">{{ $info->telephone }}</span>
            </a>

            <a
                class="flex flex-col items-center px-4 py-3 text-gray-700 rounded-md dark:text-gray-200 hover:bg-blue-200 dark:hover:bg-blue-500">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                </svg>

                <span class="mt-2 text-center">admin@aquastudios.store</span>
            </a>
        </div>

        <div class="mt-6 ">
            <div class="items-center -mx-2 md:flex">
                <div class="w-full md:mx-2">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Nombre</label>

                    <input
                        class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        wire:model="name" type="text" />
                    <x-jet-input-error for="name" />
                </div>

                <div class="w-full md:mx-2 mt-4 md:mt-0">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">E-mail</label>

                    <input
                        class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        wire:model="email" type="email">
                    <x-jet-input-error for="email" />
                </div>
            </div>

            <div class="w-full mt-4">
                <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Mensaje</label>

                <textarea
                    class="block w-full h-40 px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    wire:model="message">
                </textarea>
                <x-jet-input-error for="message" />
            </div>

            <div class="flex justify-center mt-6">
                <button
                    class="px-4 py-2 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                    wire:click="send">
                    Enviar Mensaje</button>
            </div>
        </div>
    </div>
</div>
