<div>
    {{-- Update state --}}
    <div wire:loading.delay wire:target="libelula" class="w-full h-full fixed block top-0 left-0 bg-white opacity-75 z-50 text-center">
        <span class="text-green-500 opacity-75 top-1/2 -mt-24 mb-2 mx-auto block relative" style="top: 50%;">
            <i class="fas fa-circle-notch fa-spin fa-5x"></i>
        </span>
        <p class="text-2xl text-green-500 top-1/2 block relative">Generando plataforma de pago, espere por favor...</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-5 gap-6 container py-8">

        <div class="order-2 lg:order-1 xl:col-span-3 ">
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
                <p class="text-gray-700 uppercase">
                    <span class="font-semibold">
                        Número de Reserva-{{ $order->id }}
                </p>
                </span>
            </div>

            {{--Summary order --}}
            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <div class=" grid grid-cols-2 gap-6 text-gray-700">
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
            <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
                <p class="text-xl font-semibold mb-4">Resumen</p>
                <table class="table-auto w-full">
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
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ Storage::url($service->image) }}" alt="">
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
                <h1 class="font-roboto text-2xl font-bold text-gray-800 dark:text-white mb-2">Detalles del servicio</h1>
                <span class="font-roboto mt-2 text-sm md:text-lg text-gray-600 dark:text-gray-400">{!!$service->description!!}</span>
            </div>
        

        </div>

        {{-- Button Paypal --}}
        <div class="order-1 lg:order-2 xl:col-span-2 ">
            <div class="bg-white rounded-lg shadow-lg px-6 pt-6">
                <div class="flex justify-between items-center mb-4">
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

            <div class="mt-6 bg-white rounded-lg shadow-lg px-6 pt-6">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <img class="mb-2 h-12" src="{{ asset('img/logo_bnb.png') }}" alt="">
                        <img class="mb-4 h-12" src="{{ asset('img/bancounion.png') }}" alt="">
                    </div>
                    <div class="text-gray-700 mb-5">
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

                <x-button-enlace color="blue" class="mb-4 w-full cursor-pointer text-center"
                    wire:click="libelula">
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
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: "{{ $order->total }}" // Can reference variables or functions. Example: `value: document.getElementById('...').value`
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
