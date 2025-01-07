<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    @stack('style')
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.css"
        integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @livewireStyles

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.js"
        integrity="sha512-tHimK/KZS+o34ZpPNOvb/bTHZb6ocWFXCtdGqAlWYUcz+BGHbNbHMKvEHUyFxgJhQcEO87yg5YqaJvyQgAEEtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <script src={{ asset('js/sweetalert2@11.js') }}></script>
</head>

<body class="font-roboto antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation')
        
        <!-- Page Content -->
        <main> 
            <section>
                <div class="container flex flex-col items-center px-5 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8 bg-white">
                  <div class="card shadow-2xl flex flex-col w-full max-w-4xl mx-auto prose prose-sm text-left prose-blue">
                    <div class="card-body w-full mx-auto">
                      <h1 class="uppercase text-center">POLÍTICAS DE uso y PRIVACIDAD</h1>                   
                      <p class="text-justify">La presente Política de Uso y Privacidad establece los términos en que Aqua Studios usa y protege la información que
                        es proporcionada por sus usuarios al momento de utilizar su sitio web. Esta empresa está comprometida con la
                        seguridad de los datos de sus usuarios. Cuando le pedimos llenar los campos de información personal con la cual
                        usted pueda ser identificado, lo hacemos asegurando que sólo se empleará de acuerdo con los términos de este
                        documento. Sin embargo esta Política de Privacidad puede cambiar con el tiempo o ser actualizada por lo que le
                        recomendamos y enfatizamos revisar continuamente esta página para asegurarse que está de acuerdo con dichos
                        cambios.</p>
                    <h2>Información que es recogida</h2>
                    <p class="text-justify">Nuestro sitio web podrá recoger información personal por ejemplo: Nombre,&nbsp; información de contacto
                        como&nbsp; su dirección de correo electrónico, número de telefono. Así mismo cuando sea necesario podrá
                        ser requerida información específica para procesar algún pedido o realizar una entrega.</p>
                    <h2>Uso de la información recogida</h2>
                    <p class="text-justify">Nuestro sitio web emplea la información con el fin de proporcionar el mejor servicio posible, particularmente
                        para mantener un registro de usuarios, y mejorar nuestros servicios.
                    <p class="text-justify">Aqua Studios está altamente comprometido para cumplir con el compromiso de mantener su información segura.
                        Usamos los sistemas más avanzados y los actualizamos constantemente para asegurarnos que no exista ningún acceso
                        no autorizado.</p>
                        <h2><strong>Condiciones de uso</strong></h2>
                        <p class="text-justify">Las fechas reservadas <strong class="uppercase">NO
                             pueden ser modificadas</strong> una vez que el pago por el servicio se haya hecho efectivo, esto se realiza 
                             de esta forma para ofrecer un mejor servicio al cliente, ya que se reservarán nuestros equipos con anticipación 
                             para la fecha solicitada por el usuario, un cambio a última hora podría afectar la calidad del servicio, 
                             por lo cual pedimos al usuario ponga especial énfasis en verificar la fecha que registrará en el sistema.
                        </p>
                        <p>No existen devoluciones una vez que el pago haya sido realizado.
                        </p>
                        <p class="text-justify">En caso de que Aqua Studios no cumpla con el servicio ofrecido, puede pasar por nuestras oficinas para solicitar 
                            un reembolso, puede ver la información de contacto de la empresa en la sección de <a class="link link-accent" href="/contactenos">Contacto</a>
                        </p>
    
                    <h2><strong>Cookies</strong></h2>
                    <p class="text-justify">Una cookie se refiere a un fichero que es enviado con la finalidad de solicitar permiso para almacenarse en su
                        ordenador, al aceptar dicho fichero se crea y la cookie sirve entonces para tener información respecto al
                        tráfico web, y también facilita las futuras visitas a una web recurrente. Otra función que tienen las cookies es
                        que con ellas las web pueden reconocerte individualmente y por tanto brindarte el mejor servicio personalizado
                        de su web.</p>
                    <p class="text-justify">Nuestro sitio web emplea las cookies para poder identificar las páginas que son visitadas y su frecuencia. Esta
                        información es empleada únicamente para análisis estadístico y después la información se elimina de forma
                        permanente. Usted puede eliminar las cookies en cualquier momento desde su ordenador. Sin embargo las cookies
                        ayudan a proporcionar un mejor servicio de los sitios web, estás no dan acceso a información de su ordenador ni
                        de usted, a menos de que usted así lo quiera y la proporcione directamente.
                        Usted puede aceptar o negar el uso de cookies, sin embargo la mayoría de navegadores aceptan cookies
                        automáticamente pues sirve para tener un mejor servicio web. También usted puede cambiar la configuración de su
                        ordenador para declinar las cookies. Si se declinan es posible que no pueda utilizar algunos de nuestros
                        servicios.</p>
                    <h2><strong>Enlaces a Terceros</strong></h2>
                    <p class="text-justify">Este sitio web pudiera contener enlaces a otros sitios que pudieran ser de su interés. Una vez que usted de clic
                        en estos enlaces y abandone nuestra página, ya no tenemos control sobre al sitio al que es redirigido y por lo
                        tanto no somos responsables de los términos o privacidad ni de la protección de sus datos en esos otros sitios
                        terceros. Dichos sitios están sujetos a sus propias políticas de privacidad por lo cual es recomendable que los
                        consulte para confirmar que usted está de acuerdo con estas.</p>
                    <h2><strong>Control de su información personal</strong></h2>
                    <p class="text-justify">Esta empresa no venderá, cederá ni distribuirá la información personal que es recopilada sin su consentimiento,
                        salvo que sea requerido por un juez con una orden judicial.</p>
                    <p class="text-justify">Aqua Studios se reserva el derecho de cambiar los términos de la presente Política de Uso y Privacidad en cualquier
                        momento.</p>
                    </div>
                  </div>
                </div>
              </section>
        </main>
    </div>

    @php
        use App\Models\Information;
        use App\Models\Category;
        $info = Information::first();
        $categories = Category::all();
        
    @endphp


    <footer class="flex justify-around p-10 mt-4 footer bg-neutral text-neutral-content object-center">
        <div class="">
            <span class="footer-title">Servicios</span>
            @foreach ($categories as $category)
                <a href="{{ asset('categories/'.$category->id) }}" class="link link-hover">{{$category->name}}</a>
            @endforeach
        </div>
        <div>
            <span class="footer-title">Empresa</span>
            <a href="{{ route('who.show') }}" class="link link-hover">Quienes somos</a>
            <a href="/politicas" class="link link-hover">Políticas y privacidad</a>
            <a href="{{ route('contact') }}" class="link link-hover">Contactenos</a>
            <a href="{{ route('agenda') }}" class="link link-hover">Agenda</a>
        </div>
        <div>
            <span class="footer-title">Social</span>
            <div class="grid grid-flow-col gap-4">
                <a href="{{ $info->twitter }}" target="_blank" aria-label="Twitter">
                    <svg class="text-white fill-current dark:text-gray-200 hover:text-blue-600 dark:hover:text-gray-400"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
                        <path
                            d="M492 109.5c-17.4 7.7-36 12.9-55.6 15.3 20-12 35.4-31 42.6-53.6-18.7 11.1-39.4 19.2-61.5 23.5C399.8 75.8 374.6 64 346.8 64c-53.5 0-96.8 43.4-96.8 96.9 0 7.6.8 15 2.5 22.1-80.5-4-151.9-42.6-199.6-101.3-8.3 14.3-13.1 31-13.1 48.7 0 33.6 17.2 63.3 43.2 80.7-16-.4-31-4.8-44-12.1v1.2c0 47 33.4 86.1 77.7 95-8.1 2.2-16.7 3.4-25.5 3.4-6.2 0-12.3-.6-18.2-1.8 12.3 38.5 48.1 66.5 90.5 67.3-33.1 26-74.9 41.5-120.3 41.5-7.8 0-15.5-.5-23.1-1.4C62.8 432 113.7 448 168.3 448 346.6 448 444 300.3 444 172.2c0-4.2-.1-8.4-.3-12.5C462.6 146 479 129 492 109.5z" />
                    </svg>
                </a>

                <a href="{{ $info->facebook }}" target="_blank" aria-label="Facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="text-white fill-current dark:text-gray-200 hover:text-blue-600 dark:hover:text-gray-400">
                        <path
                            d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                        </path>
                    </svg>
                </a>

                <a href="{{ $info->instagram }}" target="_blank" aria-label="Intagra,">
                    <svg class="text-white fill-current dark:text-gray-200 hover:text-red-600 dark:hover:text-gray-400"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                    </svg>
                </a>

            </div>
        </div>
    </footer>

    @stack('modals')

    @livewireScripts

    <script>
        function dropdown() {
            return {
                open: false,
                show() {
                    if (this.open) {
                        //Close menu
                        this.open = false;
                        document.getElementsByTagName('html')[0].style.overflow = 'auto'
                    } else {
                        //Open menu
                        this.open = true;
                        document.getElementsByTagName('html')[0].style.overflow = 'hidden'
                    }
                },
                close() {
                    this.open = false;
                    document.getElementsByTagName('html')[0].style.overflow = 'auto'
                }
            }
        }
    </script>

    @stack('script')

</body>

</html>
    

