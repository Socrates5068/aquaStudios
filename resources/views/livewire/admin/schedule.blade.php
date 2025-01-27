<div>
    <div>
        @push('style')
            <link rel="dns-prefetch" href="//unpkg.com" />
            <link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
            <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
            <style>
                [x-cloak] {
                    display: none;
                }

            </style>
        @endpush

        <div class="antialiased sans-serif bg-gray-100 h-screen">
            <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                <div class="container mx-auto px-4 py-2 md:py-16">

                    {{-- <div class="font-bold text-gray-800 text-xl mb-4">
                        Agenda
                    </div> --}}

                    <div class="bg-white rounded-lg shadow overflow-hidden">

                        <div class="flex items-center justify-between py-2 px-6">
                            <div>
                                <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                            </div>
                            <div class="border rounded-lg px-1" style="padding-top: 2px;">
                                <button type="button"
                                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center"
                                    :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                    :disabled="month == 0 ? true : false" @click="month--; getNoOfDays()">
                                    <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <div class="border-r inline-flex h-6"></div>
                                <button type="button"
                                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1"
                                    :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                    :disabled="month == 11 ? true : false" @click="month++; getNoOfDays()">
                                    <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="-mx-1 -mb-1">
                            <div class="flex flex-wrap" style="margin-bottom: -40px;">
                                <template x-for="(day, index) in DAYS" :key="index">
                                    <div style="width: 14.26%" class="px-2 py-2">
                                        <div x-text="day"
                                            class="text-gray-600 text-sm uppercase tracking-wide font-bold text-center">
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <div class="flex flex-wrap border-t border-l">
                                <template x-for="blankday in blankdays">
                                    <div style="width: 14.28%; height: 120px"
                                        class="text-center border-r border-b px-4 pt-2">
                                    </div>
                                </template>
                                <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                    <div style="width: 14.28%; height: 120px"
                                        class="px-4 pt-2 border-r border-b relative">
                                        <div @click="showEventModal(date)" x-text="date"
                                            class="mt-4 md:mt-0 inline-flex w-6 h-6 items-center justify-center cursor-pointer text-center leading-none rounded-full transition ease-in-out duration-100"
                                            :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }">
                                        </div>
                                        <div style="height: 80px;" class="overflow-y-auto mt-1">
                                            <div 
                                                class="absolute top-0 right-0 mt-1 md:mt-2 mr-1 md:mr-2 inline-flex items-center justify-center rounded-full text-xs md:text-sm w-4 md:w-6 h-4 md:h-6 bg-gray-700 text-white leading-none"
                                                x-show="events.filter(e => new Date(e.event_date).toDateString() === new Date(year, month, date).toDateString()).length"
                                                x-text="events.filter(e => new Date(e.event_date).toDateString() === new Date(year, month, date).toDateString()).length">
                                            </div>

                                        <template 
                                            x-for="event in events.filter(e => new Date(e.event_date).toDateString() ===  new Date(year, month, date).toDateString() )">
                                            <div class="mt-1 md:px-2 py-0.5 rounded-lg md:mt-1 overflow-hidden md:border" :class="{
                                                    'border-blue-200 text-blue-800 bg-blue-100': event.event_theme === 'blue',
                                                    'border-red-200 text-red-800 bg-red-100': event.event_theme === 'red',
                                                    'border-yellow-200 text-yellow-800 bg-yellow-100': event.event_theme === 'yellow',
                                                    'border-green-200 text-green-800 bg-green-100': event.event_theme === 'green',
                                                    'border-purple-200 text-purple-800 bg-purple-100': event.event_theme === 'purple'
                                                }">
                                                <a x-on:click="window.location=event.event_url" class="cursor-pointer">
                                                    <p x-text="event.event_title" class="text-xs md:text-sm truncate md:leading-tight">
                                                    </p>
                                                </a>
                                            </div>
                                        </template>
                                    </div>
                            </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div style=" background-color: rgba(0, 0, 0, 0.8)"
                class="fixed z-40 top-0 right-0 left-0 bottom-0 h-full w-full"
                x-show.transition.opacity="openEventModal">
                <div class="p-4 max-w-xl mx-auto absolute left-0 right-0 overflow-hidden mt-24">
                    <div class="shadow absolute right-0 top-0 w-10 h-10 rounded-full bg-white text-gray-500 hover:text-gray-800 inline-flex items-center justify-center cursor-pointer"
                        x-on:click="openEventModal = !openEventModal">
                        <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
                        </svg>
                    </div>

                    <div class="shadow w-full rounded-lg bg-white overflow-hidden block p-8">

                        <h2 class="font-bold text-2xl mb-6 text-gray-800 border-b pb-2">Agregar detalles del evento</h2>

                        <div class="mb-4">
                            <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Títutlo del
                                evento</label>
                            <input
                                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                type="text" x-model="event_title">
                        </div>

                        <div class="mb-4">
                            <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Fecha del
                                evento</label>
                            <input
                                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                type="text" x-model="dateEs()" readonly>
                        </div>

                        <div class="inline-block w-64 mb-4">
                            <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Seleccione un
                                tema</label>
                            <div class="relative">
                                <select @change="event_theme = $event.target.value;" x-model="event_theme"
                                    class="block appearance-none w-full bg-gray-200 border-2 border-gray-200 hover:border-gray-500 px-4 py-2 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-blue-500 text-gray-700"
                                    >
                                    <template x-for="(theme, index) in themes">
                                        <option :value="theme.value" x-text="theme.label"></option>
                                    </template>
                                </select>                
                            </div>
                        </div>

                        <div class="mt-8 text-right">
                            <button type="button"
                                class="bg-white hover:bg-gray-100 text-gray-700 font-semibold py-2 px-4 border border-gray-300 rounded-lg shadow-sm mr-2"
                                @click="openEventModal = !openEventModal">
                                Cancelar
                            </button>
                            <button type="button"
                                class="bg-gray-800 hover:bg-gray-700 text-white font-semibold py-2 px-4 border border-gray-700 rounded-lg shadow-sm"
                                @click="addEvent()">
                                Guardar Evento
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Modal -->
        </div>
    </div>
</div>

@push('script')
    <script>
        const MONTH_NAMES = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
            'Octubre', 'Noviembre', 'Dicienbre'
        ];
        const DAYS = ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'];

        var events = [];

        const dates = <?php echo json_encode($dates); ?>;

        dates.forEach(element => {
            var fecha = element.date;
            fecha = fecha.replace(/-/g,',');   
            var theme = '';
            switch (element.category_id) {
                case 1:
                    theme = 'yellow';
                    break;
                case 2:
                    theme = 'green';
                    break;
                case 3:
                    theme = 'red';
                    break;
                case 4:
                    theme = 'purple';
                    break;
                default:
                    theme = 'blue';
            }
            var objeto = {
                event_date: new Date(Date.parse(fecha)),
                event_title: element.name,
                event_theme: theme,
                event_url: element.url
            }
            events.push(objeto);
        });

        function app() {
            return {
                month: '',
                year: '',
                no_of_days: [],
                blankdays: [],
                days: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],

                events,
                event_date: '',
                event_title: '',
                event_theme: 'blue',
                event_url: '',

                themes: [{
                        value: "blue",
                        label: "Tema azul"
                    },
                    {
                        value: "red",
                        label: "Tema rojo"
                    },
                    {
                        value: "yellow",
                        label: "Tema amarillo"
                    },
                    {
                        value: "green",
                        label: "Tema verde"
                    },
                    {
                        value: "purple",
                        label: "Tema violeta"
                    }
                ],

                openEventModal: false,

                initDate() {
                    let today = new Date();
                    this.month = today.getMonth();
                    this.year = today.getFullYear();
                    this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
                },

                isToday(date) {
                    const today = new Date();
                    const d = new Date(this.year, this.month, date);

                    return today.toDateString() === d.toDateString() ? true : false;
                },

                showEventModal(date) {
                    // open the modal
                    this.openEventModal = true;
                    this.event_date = new Date(this.year, this.month, date).toDateString();
                },

                addEvent() {
                    if (this.event_title == '') {
                        return;
                    }

                    var date = {};
                    date.event_date = this.event_date;
                    date.event_title = this.event_title;
                    date.event_theme = this.event_theme;
                    date.event_url = 'schedule/delete?event_date='+this.event_date+'&event_title='+this.event_title+'&event_theme='+this.event_theme;

                    this.events.push({
                        event_date: this.event_date,
                        event_title: this.event_title,
                        event_theme: this.event_theme,
                        event_url: 'schedule/delete?event_date='+this.event_date+'&event_title='+this.event_title+'&event_theme='+this.event_theme,
                    });

                    Livewire.emit('saveDate', JSON.stringify(date));

                    //console.log(this.events);

                    // clear the form data
                    this.event_date = '';
                    this.event_title = '';
                    this.event_theme = 'blue';
                    event_url: '';

                    //close the modal
                    this.openEventModal = false;
                },

                getNoOfDays() {
                    let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                    // find where to start calendar day of week
                    let dayOfWeek = new Date(this.year, this.month).getDay();
                    let blankdaysArray = [];
                    for (var i = 1; i <= dayOfWeek; i++) {
                        blankdaysArray.push(i);
                    }

                    let daysArray = [];
                    for (var i = 1; i <= daysInMonth; i++) {
                        daysArray.push(i);
                    }

                    this.blankdays = blankdaysArray;
                    this.no_of_days = daysArray;
                },

                dateEs() {
                    const event = new Date(this.event_date);
                    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    return event.toLocaleDateString('es-ES', options);
                }
            }
        }
    </script>
@endpush
</div>
