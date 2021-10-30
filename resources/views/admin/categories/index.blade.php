<x-admin-layout>
    <div class="container py-12">
        @livewire('admin.create-category')
    </div>

    @push('script')
        <script>
            Livewire.on('deleteCategory', categoryId => {
            
                Swal.fire({
                    title: '¿Está seguro?',
                    text: "¡No podrá revertir está acción!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.create-category', 'delete', categoryId)
                        Swal.fire(
                            '¡Eliminado!',
                            'El registro a sido eliminado.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</x-admin-layout>
