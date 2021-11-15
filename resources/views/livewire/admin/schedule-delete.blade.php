<div>
    <div class="mt-16">
        <div
            class="bg-white max-w-xs mx-auto rounded-2xl  border-b-4 border-red-500 overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
            <div class="h-20 bg-red-500 flex items-center ">
                {{-- <h1 class="text-white ml-4 border-2 py-2 px-4 rounded-full">3</h1> --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="text-white ml-4 py-2 px-4 rounded-full w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                  </svg>
                <p class=" text-white ml-4 uppercase text-2xl">
                    {{$_GET['event_title']}}
                </p>
            </div>
            <p class="py-6  px-6 text-lg tracking-wide text-center" id="schedule">
                <label class="hidden" id="date">{{ $_GET['event_date'] }}</label>
                Fecha reservada:  <label id="showDate"></label>
            </p>
            <!-- <hr > -->
            <div class="flex justify-center px-5 mb-2 text-sm" id="delete">
                <label class="hidden" id="deleteDate">{{ $_GET['id'] }}</label>
                <button type="button" id="buttonDelete"
                    class="border border-red-500 text-red-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-red-600 focus:outline-none focus:shadow-outline">
                    Eliminar esta reserva
                </button>
            </div>
        </div>
    </div>
</div>
