<div>
    {{-- Update state --}}
    <div wire:loading.delay
        class="fixed top-0 left-0 z-50 block w-full h-full text-center bg-white opacity-75">
        <span class="relative block mx-auto mb-2 -mt-24 text-green-500 opacity-75 top-1/2" style="top: 50%;">
            <i class="fas fa-circle-notch fa-spin fa-5x"></i>
        </span>
        <p class="relative block text-2xl text-green-500 top-1/2">Estamos trabajando, espere por favor...</p>
    </div>

    @if (session()->has('error'))
        <div class="flex w-full max-w-3xl mx-auto mt-6 overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-center w-12 bg-red-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z" />
                </svg>
            </div>

            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-red-500 dark:text-red-400">Error</span>
                    <p class="text-sm text-gray-600 dark:text-gray-200">{{ session('error') }} intente nuevamente por
                        favor.</p>
                </div>
            </div>
        </div>
    @endif
    {{ $uuid }}
    <div class="container grid grid-cols-1 gap-6 py-8 lg:grid-cols-2 xl:grid-cols-5">

        <div class="order-2 lg:order-1 xl:col-span-3 ">
            <div class="px-6 py-4 mb-6 bg-white rounded-lg shadow-lg">
                <p class="text-gray-700 uppercase">
                    <span class="font-semibold">
                        Número de Reserva-{{ $order->id }}
                </p>
                </span>
            </div>

            {{-- Summary order --}}
            <div class="p-6 mb-6 bg-white rounded-lg shadow-lg">
                <div class="grid grid-cols-2 gap-6 text-gray-700 ">
                    <div>
                        <p class="text-lg font-semibold uppercase">Envío</p>
                        @if ($order->delivery_type == 1)
                            <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                            <p class="text-sm">Heroes del chaco 22</p>
                        @else
                            <p class="text-sm">Los productos serán enviados a </p>
                            <p class="text-sm">{{ $order->d_address }}</p>
                        @endif
                    </div>
                    <div>
                        <p class="text-lg font-semibold uppercase">Datos de contacto</p>
                        <p class="text-sm">Persona encargada del evento: {{ $order->name_contact }}</p>
                        <p class="text-sm">Teléfono de contacto: {{ $order->phone_contact }}</p>
                    </div>
                </div>
            </div>

            {{-- Summary service --}}
            <div class="p-6 mb-6 text-gray-700 bg-white rounded-lg shadow-lg">
                <p class="mb-4 text-xl font-semibold">Resumen</p>
                <table class="w-full table-auto">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="object-cover w-20 mr-4 h-15" src="{{ Storage::url($service->image) }}"
                                        alt="">
                                    <article>
                                        <h1 class="font-bold">{{ $service->name }}</h1>
                                    </article>
                                </div>
                            </td>
                            <td class="text-center">
                                {{ $service->price }} BOB
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h1 class="mb-2 text-2xl font-bold text-gray-800 font-roboto dark:text-white">Detalles del servicio</h1>
                <span
                    class="mt-2 text-sm text-gray-600 font-roboto md:text-lg dark:text-gray-400">{!! $service->description !!}</span>
            </div>


        </div>

        {{-- Button Paypal --}}
        <div class="order-1 lg:order-2 xl:col-span-2 ">
            <div class="px-6 pt-6 bg-white rounded-lg shadow-lg">
                <div class="flex items-center justify-between mb-4">
                    <img class="h-12" src="{{ asset('img/MC_VI_DI_2-1.jpg') }}" alt="">
                    <div class="text-gray-700">
                        <p class="font-semibold uppercase">
                            Subtotal {{ $order->total - $order->shipping_cost }} BOB
                        </p>
                        <p class="font-semibold uppercase">
                            Envío {{ $order->shipping_cost }} BOB
                        </p>
                        <p class="text-lg font-semibold uppercase">
                            Total {{ $order->total }} BOB
                        </p>
                    </div>
                </div>

                <div id="paypal-button-container"></div>

            </div>

            <div class="px-6 pt-6 mt-6 bg-white rounded-lg shadow-lg">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <img class="h-12 mb-2" src="{{ asset('img/logo_bnb.png') }}" alt="">
                        <img class="h-12 mb-4" src="{{ asset('img/bancounion.png') }}" alt="">
                    </div>
                    <div class="mb-5 text-gray-700">
                        <p class="font-semibold uppercase">
                            Subtotal {{ $order->total - $order->shipping_cost }} BOB
                        </p>
                        <p class="font-semibold uppercase">
                            Envío {{ $order->shipping_cost }} BOB
                        </p>
                        <p class="text-lg font-semibold uppercase">
                            Total {{ $order->total }} BOB
                        </p>
                    </div>
                </div>

                <x-button-enlace class="w-full mb-4 text-center cursor-pointer" wire:click="libelula">
                    Continuar con el pago
                </x-button-enlace>

            </div>
        </div>

    </div>

    @push('script')
        <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=USD">
        </script>

        <script>
            paypal.Buttons({

                // Sets up the transaction when a payment button is clicked
                createOrder: function(data, actions) {
                    let price = {{ (int)$order->total }};
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: "{{ $paypal }}" // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                            }
                        }]
                    });
                },

                // Finalize the transaction after payer approval
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(orderData) {
                        // Successful capture! For dev/demo purposes:
                        /* console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                        var transaction = orderData.purchase_units[0].payments.captures[0];
                        alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details'); */
                        Livewire.emit('payOrder')

                        // When ready to go live, remove the alert and show a success message within this page. For example:
                        // var element = document.getElementById('paypal-button-container');
                        // element.innerHTML = '';
                        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                        // Or go to another URL:  actions.redirect('thank_you.html');
                    });
                }
            }).render('#paypal-button-container');
        </script>
    @endpush

</div>
