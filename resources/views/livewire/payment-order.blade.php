<div>
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-5 gap-6 container py-8">

        <div class="order-2 lg:order-1 xl:col-span-3 ">
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
                <p class="text-gray-700 uppercase">
                    <span class="font-semibold">
                        Número de Orden-{{ $order->id }}
                </p>
                </span>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <div class=" grid grid-cols-2 gap-6 text-gray-700">
                    <div>
                        <p class="text-lg font-semibold uppercase">Envío</p>
                        @if ($order->delivery_type == 1)
                            <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                            <p class="text-sm">Calle número XX</p>
                        @else
                            <p class="text-sm">Los productos serán enviados a </p>
                            <p class="text-sm">{{ $order->d_address }}</p>
                        @endif
                    </div>
                    <div>
                        <p class="text-lg font-semibold uppercase">Datos de contacto</p>
                        <p class="text-sm">Persona que recivirá el producto: {{ $order->name_contact }}</p>
                        <p class="text-sm">Teléfono de contacto: {{ $order->phone_contact }}</p>
                    </div>
                </div>
            </div>

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
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ Storage::url($order->service->image) }}" alt="">
                                    <article>
                                        <h1 class="font-bold">{{ $order->service->name }}</h1>
                                    </article>
                                </div>
                            </td>
                            <td class="text-center">
                                {{ $order->service->price }} BOB
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>

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
