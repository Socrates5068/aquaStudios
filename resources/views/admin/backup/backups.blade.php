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

    {{-- dropzone --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @livewireStyles

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.js"
        integrity="sha512-tHimK/KZS+o34ZpPNOvb/bTHZb6ocWFXCtdGqAlWYUcz+BGHbNbHMKvEHUyFxgJhQcEO87yg5YqaJvyQgAEEtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src={{ asset('js/sweetalert2@11.js') }}></script>

    {{-- ckeditor --}}
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script> --}}
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

    {{-- dropzone --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"
        integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="antialiased font-roboto">
    <x-jet-banner />


    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        @if (isset($header))
            <header class="bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
                <header @endif


                    <!-- Page Content -->
                    <main>
                        <div class="max-w-2xl px-8 py-4 mx-auto mt-10 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <h3
                                class="mt-4 mb-6 text-2xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200">
                                Copias de seguridad de la base de datos</h3>
                            <div class="row">
                                <div class="clearfix col-xs-12">
                                    <form action="{{ route('admin.backup.create') }}" method="GET"
                                        class="add-new-backup" enctype="multipart/form-data" id="CreateBackupForm">
                                        {{ csrf_field() }}
                                        <input type="submit" name="submit"
                                            class="theme-button btn btn-primary pull-right" style="margin-bottom:2em;"
                                            value="Crear Copia de seguridad">
                                    </form>
                                </div>
                                <div class="col-xs-12">
                                    @if (Session::has('success'))
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif

                                    @if (Session::has('update'))
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            {{ Session::get('update') }}
                                        </div>
                                    @endif

                                    @if (Session::has('delete'))
                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            {{ Session::get('delete') }}
                                        </div>
                                    @endif

                                    @if (count($backups))
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nombre del archivo</th>
                                                    {{-- <th>File Size</th> --}}
                                                    {{-- <th>Created Date</th>
                                                    <th>Created Age</th> --}}
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($backups as $backup)
                                                    <tr>
                                                        <td>{{ $backup['file_name'] }}</td>
                                                        {{-- <td>{{ \App\Http\Controllers\BackupController::humanFilesize($backup['file_size']) }} --}}
                                                        </td>
                                                        {{-- <td>
                                                            {{ date('F jS, Y, g:ia (T)', $backup['last_modified']) }}
                                                        </td>
                                                        <td>
                                                            {{ \Carbon\Carbon::parse($backup['last_modified'])->diffForHumans() }}
                                                        </td> --}}
                                                        <td class="text-right">
                                                            <a class="btn btn-success"
                                                                href="{{ route('admin.backup.download', $backup['file_name']) }}"><i
                                                                    class="fa fa-cloud-download"></i> Download</a>
                                                            <a class="btn btn-danger"
                                                                onclick="return confirm('¿Realmente quiere eliminar este archivo?')"
                                                                data-button-type="delete"
                                                                href="{{ route('admin.backup.delete', $backup['file_name']) }}"><i
                                                                    class="fa fa-trash-o"></i>
                                                                Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div class="well">
                                            <h4>No backups</h4>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>
                            {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script> --}}
                            <script type="text/javascript">
                                $("#CreateBackupForm").on('submit', function(e) {
                                    $('.theme-button').attr('disabled', 'disabled');
                                });
                            </script>
                        </div>

                    </main>
    </div>

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
